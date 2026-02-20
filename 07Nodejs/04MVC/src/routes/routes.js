const pageController = require('../controllers/controller');

function pageRoutes(req, res) {

    if (req.method === 'GET' && req.url === '/') {
        return pageController.home(req, res);
    }

    if (req.method === 'GET' && req.url === '/users') {
        return pageController.users(req, res);
    }

    res.writeHead(404);
    res.end('Not found');
}

module.exports = pageRoutes;

