clc;
clear;

syms theta1 theta2 theta3 real

disp('--- Matrices A1, A2, A3 ---')

% تابع: Transform(theta, d, a, alpha)

A1 = Transform(theta1, 0, 0, 0);
disp('A1 ='); 
disp(A1);

A2 = Transform(theta2, 0.2435, 0, -pi/2);
disp('A2 ='); 
disp(A2);

A3 = Transform(theta3, -0.0934, 0.4318, 0);
disp('A3 ='); 
disp(A3);

% سینماتیک مستقیم
T02 = A1 * A2;
T03 = T02 * A3;

disp('T03 =');
disp(T03);

disp('--- Final Position (Px, Py, Pz) ---')
Px3 = T03(1,4);
Py3 = T03(2,4);
Pz3 = T03(3,4);

disp('Px3 ='); disp(Px3);
disp('Py3 ='); disp(Py3);
disp('Pz3 ='); disp(Pz3);