all: docs/api

docs/api: clean
	phpdoc -q -f libraries/Waveform.php -t docs/api -ti 'Waveform API reference' -o HTML:frames:earthli -dn WaveForm

clean:
	-rm -r docs/api/*
