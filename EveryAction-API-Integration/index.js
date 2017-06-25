#!/usr/bin/env nodejs

var request = require('request');

// TODO: Put these secrets somewhere else!
// EveryAction application name
var username = '';
// EveryAction API key. This must be suffixed with either '|0' or '|1'
var password = '';
var default_request_options = {
	auth: {
		user: username,
		password: password
	}
};

var express = require('express');
var app = express();

app.listen(8080);

app.get('/:van_id', function(req, express_response) {
	// TODO: Do some basic validation on van_id, should be an integer
	let van_id = req.params.van_id; // Use 101166097 as a real ID
	let van_id_url = `https://api.securevan.com/v4/people/${van_id}`

	// Equivalent of jQuery.extend()
	let request_params = Object.assign({}, default_request_options, {url: van_id_url});

	request(request_params, function(err, res, body) {
		if (err) {
			console.dir(err);
			return;
		}
		console.dir('headers', res.headers);
		console.dir('status code', res.statusCode);
		console.log(body);
		express_response.json(JSON.parse(body));
		return;
	});
	/*default_request_options['body'] = JSON.stringify({"firstName": "John"});
	request.post(default_request_options, function(err, res, body) {
		console.dir(body);
		//express_response.json(JSON.parse(body));
	});*/
});
