## Some information
The project has two parts the API makes all the decisions of the game, and the front part only shows the information of API. If one move is invalid or the game will be finished the API sends an exception.

### To execute front
cd front/; yarn; yarn serve

### To execute API:
composer install; ./vendor/bin/phpunit tests/Unit


### TODO API
* Needs to calculate the rules of the game
* Serialize data input and output from request to the models board/player
* Manage exceptions
* Create the endpoints

### TODO Front
* Create the connection to the API endpoints
* Manage the exceptions, if the game is finished or is an invalid move. 
* Manage the update of the data if works
* Do an acceptance test of a game with moves to control if the rules works  





