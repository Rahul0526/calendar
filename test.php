<?php 
header('Content-Type: application/json');
echo '{
	"version": "1.00",
	"response": {
		"card": {
			"type": "Simple",
			"content": "Keine produkte für-Produkte für finde ich gefunden.",
			"title": "lager",
			"subtitle": null
		},
		"outputSpeech": {
			"type": "PlainText",
			"text": "Playing the requested song."
		},
		"Reprompt": null,
		"shouldEndSession": false
	}
}';die;
?>

{
	"version": "1.00",
	"response": {
		"card": {
			"type": "Simple",
			"content": "Keine produkte für-Produkte für finde ich gefunden.",
			"title": "lager",
			"subtitle": null
		},
		"outputSpeech": {
			"type": "Plaintext",
			"text": "Keine produkte für-Produkte für finde ich gefunden."
		},
		"Reprompt": null,
		"shouldEndSession": false
	}
}