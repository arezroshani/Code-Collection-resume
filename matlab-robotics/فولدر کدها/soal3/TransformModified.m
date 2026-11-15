function T = TransformModified(alpha, a, theta, d)
% Modified Denavit-Hartenberg transform (Craig's convention):
%   T = Rx(alpha_{i-1}) * Tx(a_{i-1}) * Rz(theta_i) * Tz(d_i)
    ca = cos(alpha);
    sa = sin(alpha);
    ct = cos(theta);
    st = sin(theta);

    T = [ct,      -st,      0,     a;
         st*ca,    ct*ca,  -sa,   -sa*d;
         st*sa,    ct*sa,   ca,    ca*d;
         0,         0,       0,     1];
end