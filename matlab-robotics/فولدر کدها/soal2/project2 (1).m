clc;
clear;
format long g

syms theta1 theta2 theta3 real

% --- Forward Kinematics (same as your Q1) ---
A1 = Transform(theta1, 0,      0,      0);
A2 = Transform(theta2, 0.2435, 0,     -pi/2);
A3 = Transform(theta3,-0.0934, 0.4318, 0);

T03 = A1*A2*A3;

px = T03(1,4);
py = T03(2,4);
pz = T03(3,4);

% ---------- DP1 ----------
x = 0.0934;  y = -0.4318;  z = 0.2435;

S1 = vpasolve( ...
    [px==x, py==y, pz==z], ...
    [theta1, theta2, theta3], ...
    [-pi, pi;
    -pi, pi;
    -pi, pi]);

disp('--- DP1 ---')
t1 = double(vpa(S1.theta1, 12));
t2 = double(vpa(S1.theta2, 12));
t3 = double(vpa(S1.theta3, 12));

fprintf('theta1 = %.6f deg\n', t1*180/pi);
fprintf('theta2 = %.6f deg\n', t2*180/pi);
fprintf('theta3 = %.6f deg\n', t3*180/pi);

px_chk = double(vpa(subs(px, [theta1 theta2 theta3], [t1 t2 t3]), 12));
py_chk = double(vpa(subs(py, [theta1 theta2 theta3], [t1 t2 t3]), 12));
pz_chk = double(vpa(subs(pz, [theta1 theta2 theta3], [t1 t2 t3]), 12));

fprintf('check = [%.6f, %.6f, %.6f]\n', px_chk, py_chk, pz_chk);
fprintf('error = [%.6e, %.6e, %.6e]\n\n', px_chk-x, py_chk-y, pz_chk-z);

% ---------- DP2 ----------
x = 0.4318;  y = -0.0934;  z = 0.2435;
S2 = vpasolve( ...
    [px==x, py==y, pz==z], ...
    [theta1, theta2, theta3], ...
    [-pi, pi;
     -pi, pi;
     -pi, pi]);

disp('--- DP2 ---')
t1 = double(vpa(S2.theta1, 12));
t2 = double(vpa(S2.theta2, 12));
t3 = double(vpa(S2.theta3, 12));

fprintf('theta1 = %.6f deg\n', t1*180/pi);
fprintf('theta2 = %.6f deg\n', t2*180/pi);
fprintf('theta3 = %.6f deg\n', t3*180/pi);

px_chk = double(vpa(subs(px, [theta1 theta2 theta3], [t1 t2 t3]), 12));
py_chk = double(vpa(subs(py, [theta1 theta2 theta3], [t1 t2 t3]), 12));
pz_chk = double(vpa(subs(pz, [theta1 theta2 theta3], [t1 t2 t3]), 12));

fprintf('check = [%.6f, %.6f, %.6f]\n', px_chk, py_chk, pz_chk);
fprintf('error = [%.6e, %.6e, %.6e]\n\n', px_chk-x, py_chk-y, pz_chk-z);

% ---------- DP3 ----------
x = 0.0934;  y = 0.4318;   z = 0.2435;
S3 = vpasolve( ...
    [px==x, py==y, pz==z], ...
    [theta1, theta2, theta3], ...
    [-pi, pi;
     -pi, pi;
     -pi, pi]);

disp('--- DP3 ---')
t1 = double(vpa(S3.theta1, 12));
t2 = double(vpa(S3.theta2, 12));
t3 = double(vpa(S3.theta3, 12));

fprintf('theta1 = %.6f deg\n', t1*180/pi);
fprintf('theta2 = %.6f deg\n', t2*180/pi);
fprintf('theta3 = %.6f deg\n', t3*180/pi);

px_chk = double(vpa(subs(px, [theta1 theta2 theta3], [t1 t2 t3]), 12));
py_chk = double(vpa(subs(py, [theta1 theta2 theta3], [t1 t2 t3]), 12));
pz_chk = double(vpa(subs(pz, [theta1 theta2 theta3], [t1 t2 t3]), 12));

fprintf('check = [%.6f, %.6f, %.6f]\n', px_chk, py_chk, pz_chk);
fprintf('error = [%.6e, %.6e, %.6e]\n\n', px_chk-x, py_chk-y, pz_chk-z);

% ---------- DP4 ----------
x = 0.4318;  y = 0.0934;   z = 0.2435;
S4 = vpasolve([px==x, py==y, pz==z]);

disp('--- DP4 ---')
t1 = double(vpa(S4.theta1, 12));
t2 = double(vpa(S4.theta2, 12));
t3 = double(vpa(S4.theta3, 12));

fprintf('theta1 = %.6f deg\n', t1*180/pi);
fprintf('theta2 = %.6f deg\n', t2*180/pi);
fprintf('theta3 = %.6f deg\n', t3*180/pi);

px_chk = double(vpa(subs(px, [theta1 theta2 theta3], [t1 t2 t3]), 12));
py_chk = double(vpa(subs(py, [theta1 theta2 theta3], [t1 t2 t3]), 12));
pz_chk = double(vpa(subs(pz, [theta1 theta2 theta3], [t1 t2 t3]), 12));

fprintf('check = [%.6f, %.6f, %.6f]\n', px_chk, py_chk, pz_chk);
fprintf('error = [%.6e, %.6e, %.6e]\n', px_chk-x, py_chk-y, pz_chk-z);
