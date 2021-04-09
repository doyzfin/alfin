const helper = require('../../helpers/wrapper')
const premiereModel = require('../premiere/premiere_model')
module.exports = {
  sayHello: (req, res) => {
    res.status(200).send('Hello World')
  },
  getAllMovie: async (req, res) => {
    try {
      console.log(res)
      return helper.response(res, 200, 'Succes Get Data')
    } catch (error) {
      return helper.response(res, 400, 'Bad Request', error)
    }
  }
}
