clc;
clear;
format long g

%% -------- Forward kinematics (True Modified DH) --------------------
syms theta1 theta2 theta3 theta4 real

% Table A1 rows, using TransformModified(alpha_{i-1}, a_{i-1}, theta_i, d_i)
A1 = TransformModified(0,      0,       theta1, 0);
A2 = TransformModified(-pi/2,  0,       theta2, 0.2435);
A3 = TransformModified(0,      0.4318,  theta3, -0.0934);
A4 = TransformModified(pi/2,  -0.0203,  theta4, 0.4331);   

T04 = A1*A2*A3*A4;
T04 = simplify(T04);

px = T04(1,4);
py = T04(2,4);
pz = T04(3,4);

fprintf('--- Parametric position (wrist point), theta4 kept symbolic ---\n');
fprintf('Px = '); disp(px)
fprintf('Py = '); disp(py)
fprintf('Pz = '); disp(pz)


%% --- Inverse kinematics for DP1 (numeric) --------------------
x = 0.0934;  y = -0.4318;  z = 0.2435;

bounds = [-pi, pi; -pi, pi; -pi, pi];

S1 = vpasolve( ...
    [px==x, py==y, pz==z], ...
    [theta1, theta2, theta3], ...   % only 3 unknowns solved (theta4 is not part of position)
    bounds);

t1 = double(vpa(S1.theta1, 12));
t2 = double(vpa(S1.theta2, 12));
t3 = double(vpa(S1.theta3, 12));

fprintf('--- Joint angles for DP1 (True Modified DH) ---\n');
fprintf('theta1 = %.6f deg\n', t1*180/pi);
fprintf('theta2 = %.6f deg\n', t2*180/pi);
fprintf('theta3 = %.6f deg\n', t3*180/pi);

%% -------- Build the robot model (Robotics Toolbox - rvc) --------------------
if ~(exist('SerialLink', 'class') == 8 || exist('SerialLink', 'file') == 2)
    error(['Robotics Toolbox (Peter Corke / rvctools) not found on the MATLAB path.' newline ...
           'Download it from https://petercorke.com/toolboxes/robotics-toolbox/' newline ...
           'then in MATLAB run:  cd(''<path_to_rvctools>''); startup_rvc']);
end

% Only 3 ACTUATED joints (matches the problem: wrist joints not considered).
L1 = Link('alpha', 0,      'a', 0,       'd', 0,      'modified');
L2 = Link('alpha', -pi/2,  'a', 0,       'd', 0.2435, 'modified');
L3 = Link('alpha', 0,      'a', 0.4318,  'd', -0.0934,'modified');

robot = SerialLink([L1 L2 L3], 'name', 'PUMA560_3DOF_modified');

% Fixed transform from joint 3 to the wrist point (theta4 = 0, rigid, no motion):
A4_fixed = double(subs(A4, theta4, 0));
robot.tool = A4_fixed;

theta = [t1, t2, t3];   % joint configuration (only 3 joints)

%% -----------Place robot at theta and verify --------------------
fprintf('\nNumber of actual (moving) joints in the model: robot.n = %d\n', robot.n);

figure;
robot.plot(theta, 'workspace', [-0.8 0.8 -0.8 0.8 -0.4 0.8]);
title('PUMA 560 (Modified DH) - 3 joints - DP1');
view(135, 20);

T = robot.fkine(theta);
if isa(T, 'SE3')
    P_toolbox = T.t;
else
    P_toolbox = T(1:3, 4);
end

fprintf('\n--- Verification ---\n');
fprintf('Desired Point 1        = [%.4f, %.4f, %.4f]\n', x, y, z);
fprintf('Toolbox fkine position = [%.4f, %.4f, %.4f]\n', P_toolbox(1), P_toolbox(2), P_toolbox(3));
fprintf('Error                  = [%.2e, %.2e, %.2e]\n', ...
    P_toolbox(1)-x, P_toolbox(2)-y, P_toolbox(3)-z);
