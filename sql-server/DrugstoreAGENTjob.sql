USE [msdb]
GO

/****** Object:  Job [Drugstorejob]    Script Date: 6/19/2026 4:11:44 PM ******/
BEGIN TRANSACTION
DECLARE @ReturnCode INT
SELECT @ReturnCode = 0
/****** Object:  JobCategory [[Uncategorized (Local)]]    Script Date: 6/19/2026 4:11:44 PM ******/
IF NOT EXISTS (SELECT name FROM msdb.dbo.syscategories WHERE name=N'[Uncategorized (Local)]' AND category_class=1)
BEGIN
EXEC @ReturnCode = msdb.dbo.sp_add_category @class=N'JOB', @type=N'LOCAL', @name=N'[Uncategorized (Local)]'
IF (@@ERROR <> 0 OR @ReturnCode <> 0) GOTO QuitWithRollback

END

DECLARE @jobId BINARY(16)
EXEC @ReturnCode =  msdb.dbo.sp_add_job @job_name=N'Drugstorejob', 
		@enabled=1, 
		@notify_level_eventlog=0, 
		@notify_level_email=0, 
		@notify_level_netsend=0, 
		@notify_level_page=0, 
		@delete_level=0, 
		@description=N'Nightly update statistics + index maintenance for drugstoreDB', 
		@category_name=N'[Uncategorized (Local)]', 
		@owner_login_name=N'LAPTOP-08KFF61O\roshany', @job_id = @jobId OUTPUT
IF (@@ERROR <> 0 OR @ReturnCode <> 0) GOTO QuitWithRollback
/****** Object:  Step [step1]    Script Date: 6/19/2026 4:11:45 PM ******/
EXEC @ReturnCode = msdb.dbo.sp_add_jobstep @job_id=@jobId, @step_name=N'step1', 
		@step_id=1, 
		@cmdexec_success_code=0, 
		@on_success_action=1, 
		@on_success_step_id=0, 
		@on_fail_action=2, 
		@on_fail_step_id=0, 
		@retry_attempts=0, 
		@retry_interval=0, 
		@os_run_priority=0, @subsystem=N'TSQL', 
		@command=N'USE db_Drugstore;
GO
SET NOCOUNT ON;

DECLARE 
    @JobName sysname = N''JOB_Drugstore_Maintenance'',
    @Now datetime2(0) = SYSDATETIME(),
    @sql nvarchar(max) = N'''',
    @AlterCount int = 0;

BEGIN TRY

    INSERT INTO dbo.AuditLogs (TableName, RecordID, ActionType, ChangedBy, ChangeDate, OldValues, NewValues)
    VALUES (N''SQLAgentJob'', 0, N''START'', SUSER_SNAME(), @Now, NULL, CONCAT(N''Job started: '', @JobName));

    EXEC sp_updatestats;

    ;WITH x AS (
        SELECT
            s.name  AS SchemaName,
            t.name  AS TableName,
            i.name  AS IndexName,
            ps.avg_fragmentation_in_percent AS Frag
        FROM sys.dm_db_index_physical_stats(DB_ID(), NULL, NULL, NULL, ''LIMITED'') ps
        JOIN sys.indexes i  ON i.object_id = ps.object_id AND i.index_id = ps.index_id
        JOIN sys.tables  t  ON t.object_id = i.object_id
        JOIN sys.schemas s  ON s.schema_id = t.schema_id
        WHERE i.index_id > 0
          AND ps.avg_fragmentation_in_percent >= 10
          AND i.is_disabled = 0
          AND i.is_hypothetical = 0
          AND i.name IS NOT NULL
    )
    SELECT 
        @sql = @sql + CASE 
            WHEN Frag >= 30 THEN
                N''ALTER INDEX '' + QUOTENAME(IndexName) + N'' ON '' 
                + QUOTENAME(SchemaName) + N''.'' + QUOTENAME(TableName) + N'' REBUILD;''
            ELSE
                N''ALTER INDEX '' + QUOTENAME(IndexName) + N'' ON '' 
                + QUOTENAME(SchemaName) + N''.'' + QUOTENAME(TableName) + N'' REORGANIZE;''
        END + CHAR(10),
        @AlterCount = @AlterCount + 1
    FROM x;

    IF (LEN(@sql) > 0)
        EXEC sp_executesql @sql;

    INSERT INTO dbo.AuditLogs (TableName, RecordID, ActionType, ChangedBy, ChangeDate, OldValues, NewValues)
    VALUES (N''SQLAgentJob'', 0, N''SUCCESS'', SUSER_SNAME(), SYSDATETIME(), 
            CONCAT(N''Alter statements executed: '', @AlterCount),
            CONCAT(N''Job finished: '', @JobName));

END TRY
BEGIN CATCH

    INSERT INTO dbo.AuditLogs (TableName, RecordID, ActionType, ChangedBy, ChangeDate, OldValues, NewValues)
    VALUES (N''SQLAgentJob'', 0, N''FAILED'', SUSER_SNAME(), SYSDATETIME(),
            CONCAT(N''Error '', ERROR_NUMBER(), N'' Line '', ERROR_LINE()),
            ERROR_MESSAGE());

    THROW;
END CATCH;
GO
', 
		@database_name=N'db_Drugstore', 
		@flags=0
IF (@@ERROR <> 0 OR @ReturnCode <> 0) GOTO QuitWithRollback
EXEC @ReturnCode = msdb.dbo.sp_update_job @job_id = @jobId, @start_step_id = 1
IF (@@ERROR <> 0 OR @ReturnCode <> 0) GOTO QuitWithRollback
EXEC @ReturnCode = msdb.dbo.sp_add_jobschedule @job_id=@jobId, @name=N'Weekly_Maintenance', 
		@enabled=1, 
		@freq_type=8, 
		@freq_interval=1, 
		@freq_subday_type=1, 
		@freq_subday_interval=0, 
		@freq_relative_interval=0, 
		@freq_recurrence_factor=1, 
		@active_start_date=20260602, 
		@active_end_date=99991231, 
		@active_start_time=0, 
		@active_end_time=235959, 
		@schedule_uid=N'539237d9-c637-48d4-a649-0c1afedee3aa'
IF (@@ERROR <> 0 OR @ReturnCode <> 0) GOTO QuitWithRollback
EXEC @ReturnCode = msdb.dbo.sp_add_jobserver @job_id = @jobId, @server_name = N'(local)'
IF (@@ERROR <> 0 OR @ReturnCode <> 0) GOTO QuitWithRollback
COMMIT TRANSACTION
GOTO EndSave
QuitWithRollback:
    IF (@@TRANCOUNT > 0) ROLLBACK TRANSACTION
EndSave:
GO


