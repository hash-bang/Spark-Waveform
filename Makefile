all: docs/api

docs/api: clean waveform.php
	phpdoc -q -f waveform.php -t docs/api -ti 'Waveform API reference' -o HTML:frames:earthli -dn WaveForm

commit: README
	-git commit -a

push: commit
	git push

clean:
	-rm -r docs/api/*
