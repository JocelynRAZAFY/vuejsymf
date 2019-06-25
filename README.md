#Vuejs - APIPlatform - Symfony 4

Steps:  
    
    - composer install  
    - yarn install  
    - yarn encore dev --watch
    - php bin/console gos:websocket:server  
    - php bin/console server:run  
    
docker:

    - docker-compose up -d
    - docker-compose exec apache bash
    - docker-compose down