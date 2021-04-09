const helper = require('../../helpers/wrapper')
// const { getDataAll } = require('./movie_model')
const movieModel = require('./movie_model')
module.exports = {
  sayHello: (req, res) => {
    res.status(200).send('Hello World')
  },
  getAllMovie: async (req, res) => {
    try {
      let { page, limit } = req.query
      page = parseInt(page)
      limit = parseInt(limit)
      const totalData = await movieModel.getDataCount()

      const totalPage = Math.ceil(totalData / limit)

      const offset = page * limit - limit
      const pageInfo = {
        page,
        totalPage,
        limit,
        totalData
      }

      const result = await movieModel.getDataAll(limit, offset)
      return helper.response(res, 200, 'Succes Get Data', result, pageInfo)
    } catch (error) {
      return helper.response(res, 400, 'Bad Request', error)
    }
  },
  getMovieById: async (req, res) => {
    try {
      const { id } = req.params
      const result = await movieModel.getDataById(id)
      // Kondisi
      if (result.length > 0) {
        return helper.response(
          res,
          200,
          `Succes Get Data By Id = ${id}`,
          result
        )
      } else {
        return helper.response(res, 404, `Data Not Found By Id = ${id}`, null)
      }
    } catch (error) {
      return helper.response(res, 400, 'Bad Request', error)
    }
  },
  postMovie: async (req, res) => {
    try {
      console.log(req.body)
      const { movie_name, movie_release_date } = req.body
      const setData = {
        movie_name,
        movie_release_date
      }
      const result = await movieModel.createData(setData)
      return helper.response(res, 200, 'Succes Post Movie', result)
    } catch (error) {
      return helper.response(res, 400, 'Bad Request', error)
    }
  },
  updateMovie: async (req, res) => {
    try {
      const { id } = req.params
      // Kondisi
      // if (result.length > 0) {
      //   return helper.response(
      //     res,
      //     200,
      //     `Succes Get Data By Id = ${id}`,
      //     result
      //   )
      // } else {
      //   return helper.response(res, 404, `Data Not Found By Id = ${id}`, null)
      // }
      const { movie_name, movie_release_date } = req.body
      const setData = {
        movie_name,
        movie_release_date,
        updated_at: new Date(Date.now())
      }
      const result = await movieModel.updateData(setData, id)
      return helper.response(res, 200, 'Succes Update Movie', result)
    } catch (error) {
      return helper.response(res, 400, 'Bad Request', error)
    }
  },
  deleteMovie: async (req, res) => {
    try {
      //   1.buat req di postman
      //   2. set up controller dan model
      console.log(req.params)
    } catch (error) {
      return helper.response(res, 400, 'Bad Request', error)
    }
  }
}
