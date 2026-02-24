const pageController = require('../controllers/controller');

function pageRoutes(req, res) {
    const [baseURL, id] = optenerDinamica(req, "depart")
    console.log("===========================");
    console.log(baseURL);


    if (req.method === 'GET' && req.url === '/') {
        return pageController.home(req, res);
    }
    if (req.method === 'GET' && req.url === '/depart/createForm') {
        return pageController.craeteForm(req, res);
    }
    if (req.method === 'POST' && req.url === '/depart/insert') {
        return pageController.insert(req, res);
    }
    if (req.method === 'POST' && baseURL === '/depart/updateForm') {
        return pageController.updateForm(req, res, id);
    }
    if (req.method === 'POST' && baseURL === '/depart/update') {
        return pageController.update(req, res, id);
    }
    if (req.method === 'POST' && baseURL === '/depart/delete') {
        return pageController.delete(req, res, id);
    }

    res.writeHead(404);
    res.end('Not found');
}

function optenerDinamica(req, base) {
    const partes = req.url.split("/")
    let baseURL = ""
    for (let i = 1; i < partes.length - 1; i++) {
        baseURL = baseURL + "/" + partes[i]
    }

    if (partes[partes.length - 1]) {
        const id = partes[partes.length - 1]
        console.log(id);
        console.log(baseURL);
        return [baseURL, id]
    } else {
        console.log(baseURL);
        return [baseURL, null]
    }
}
module.exports = pageRoutes;

