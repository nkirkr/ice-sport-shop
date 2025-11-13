const config = {
  mode: "production",
  entry: {
    main: "./src/js/main.js",
    index: "./src/js/index.js",
    blog: "./src/js/blog.js",
    article: "./src/js/article.js",
    product: "./src/js/product.js",
    catalog: "./src/js/catalog.js",
    specialist: "./src/js/specialist.js",
    contacts: "./src/js/contacts.js",
    dekor: "./src/js/dekor.js",
    about: "./src/js/about.js",
    services: "./src/js/services.js",
    "services-single": "./src/js/services-single.js",
    promo: "./src/js/promo.js",
    portfolio: "./src/js/portfolio.js",
    specialists: "./src/js/specialists.js",
    case: "./src/js/case.js",
  },
  output: {
    filename: "[name].bundle.js",
  },
  performance: {
    hints: false,
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: ["style-loader", "css-loader"],
      },
    ],
  },
};

module.exports = config;
