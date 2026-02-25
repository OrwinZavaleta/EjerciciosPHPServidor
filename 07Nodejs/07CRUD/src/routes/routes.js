const pageController = require('../controllers/controller');

function pageRoutes(req, res) {
    // const [baseURL, id] = optenerDinamica(req, "depart")

    const [baseURL, id] = optenerDinamica(req)
    console.log(baseURL + " ==> " + id);


    if (req.method === 'GET' && req.url === '/') {
        return pageController.home(req, res);
    }
    if (req.method === 'GET' && req.url === '/depart/createForm') {
        return pageController.craeteForm(req, res);
    }
    if (req.method === 'POST' && req.url === '/depart/insert') {
        return pageController.insert(req, res);
    }
    if (req.method === 'GET' && baseURL === '/depart/updateForm' && id) {
        return pageController.updateForm(req, res, id);
    }
    if (req.method === 'POST' && baseURL === '/depart/update' && id) {
        return pageController.update(req, res, id);
    }
    if (req.method === 'GET' && baseURL === '/depart/delete' && id) {
        return pageController.deleteDepart(req, res, id);
    }

    res.writeHead(404);
    res.end('Not found');
}

function optenerDinamica(req) {
    const partes = req.url.split("/")
    let baseurl = ""
    const id = partes.pop()
    if (!id || isNaN(Number(id))) {

        for (let i = 1; i < partes.length; i++) {
            baseurl = baseurl + "/" + partes[i]
        }
        return [baseurl + "/" + id, null]
    }

    for (let i = 1; i < partes.length; i++) {
        baseurl = baseurl + "/" + partes[i]
    }

    return [baseurl, Number(id)]
}
module.exports = pageRoutes;

