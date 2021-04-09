const express = require('express')
const Route = express.Router()
const premiereController = require('../premiere/premiere_controller')

Route.get('/hello', premiereController.sayHello)
