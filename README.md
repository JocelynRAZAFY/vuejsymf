# Private Chat Application with Symfony 4, FOSUserBundle, GOSWebSocketBundle and Vue.js

This application is a private chat example and who is online functionnality.

Made with Symfony 4 and VueJS

Database: MySQL/MariaDB

Bundles: FOSUserBundle, GOSWebSocketBundle

Packages Yarn: webpack-encore, node-sass, sass-loader, vue, vue-router, vuex, momentjs, favico.js, lodash, webpack-bundle-analyzer

Steps:  
    - composer install  
    - yarn install  
    - yarn run encore production  
    - php bin/console gos:websocket:server  
    - php bin/console server:run  
    
Installation hwi oauth bundle:

    - composer require php-http/guzzle6-adapter:^1.1
    - composer require php-http/httplug-bundle
    - composer require hwi/oauth-bundle
    
    