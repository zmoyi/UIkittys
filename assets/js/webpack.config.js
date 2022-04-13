const path=require('path');
module.exports={
    //JavaScript执行入口文件,
    entry:'./src/main.js',
    //需要指定一下输出的路径path和输出的文件名filename
    output:{
        filename:'index.js',   //自定义输出文件名
        path:path.resolve(__dirname,'./dist')  //自定义输出文件所在目录
    },
    mode: "development",
    module: {
        rules: [
            {
                test: /\.css$/i,
                use: ['style-loader', 'css-loader'],
            },
        ],
    }  // 设置mode
}
