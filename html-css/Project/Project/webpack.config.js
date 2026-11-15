import path from 'path';
import HtmlWebpackPlugin from 'html-webpack-plugin';
import CopyWebpackPlugin from 'copy-webpack-plugin';
import MiniCssExtractPlugin from 'mini-css-extract-plugin';

export default {
  mode: 'development',
  entry: './src/main.js', // ✅ این فایل باید style.css رو ایمپورت کنه
  output: {
    filename: 'bundle.js',
    path: path.resolve('./dist'),
    clean: true,
  },
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env'],
          },
        },
      },
      {
        test: /\.css$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'postcss-loader', // ✅ برای Tailwind الزامیه
        ],
      },
      {
        test: /\.(woff|woff2|eot|ttf|otf)$/i,
        type: 'asset/resource',
        generator: {
          filename: 'fonts/[name][ext][query]',
        },
      },
      {
        test: /\.(png|jpe?g|gif|webp)$/i,
        type: 'asset/resource',
        generator: {
          filename: 'img/[name][ext][query]',
        },
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'bundle.css',
    }),
    new HtmlWebpackPlugin({
      filename: 'index.html',
      template: './src/index.html',
    }),
    new HtmlWebpackPlugin({
      filename: 'login.html',
      template: './src/login.html',
    }),
    new HtmlWebpackPlugin({
      filename: 'signup.html',
      template: './src/signup.html',
    }),
    new HtmlWebpackPlugin({
      filename: 'vahed.html',
      template: './src/vahed.html',
    }),
    new HtmlWebpackPlugin({
      filename: 'Paybill.html',
      template: './src/Paybill.html',
    }),
    new CopyWebpackPlugin({
      patterns: [{ from: 'src/img', to: 'img' }],
    }),
  ],
  devServer: {
    static: './dist',
    hot: true,
    historyApiFallback: false,
    open: true,
  },
};
