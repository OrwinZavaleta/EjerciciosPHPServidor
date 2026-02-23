const pageController = require('../controllers/controller');
const apiController = require('../controllers/apiController');

function pageRoutes(req, res) {

    // if (req.method === 'GET' && req.url === '/') {
    //     return pageController.home(req, res);
    // }
    // if (req.method === 'GET' && req.url === '/users') {
    //     return pageController.users(req, res);
    // }


    if (req.method === 'GET' && req.url === '/api/users') {
        return apiController.getUsers(req, res);
    }
    if (req.method === 'POST' && req.url === '/api/users') {
        return apiController.addUser(req, res);
    }
    // if (req.method === 'GET' && req.url === '/api/users/:id') {
    //     return apiController.getUser(req, res);
    // }
    // if (req.method === 'PUT' && req.url === '/api/users/:id') {
    //     return apiController.updateUser(req, res);
    // }
    // if (req.method === 'DELETE' && req.url === '/api/users/:id') {
    //     return apiController.deleteUser(req, res);
    // }

    res.writeHead(404);
    res.end('Not found');
}

module.exports = pageRoutes;

