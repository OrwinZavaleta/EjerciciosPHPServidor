const pageController = require('../controllers/controller');

function pageRoutes(req, res) {

    if (req.method === 'GET' && req.url === '/') {
        return pageController.home(req, res);
    }

    if (req.method === 'GET' && req.url === '/depart/createForm') {
        return pageController.craeteForm(req, res);
    }
    if (req.method === 'POST' && req.url === '/depart/insert') {
        return pageController.insert(req, res);
    }

    res.writeHead(404);
    res.end('Not found');
}

module.exports = pageRoutes;

