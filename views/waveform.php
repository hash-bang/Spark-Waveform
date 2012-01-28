<?
/**
Simple Waveform form output view
*
* Optional named parameters:
*
* @param string $header Either HTML or plaintext header to output (if plaintext, will be wrapped in <p> tags)
*/
<? $this->load->view('jquery/itip') ?>
<? if (isset($header)) { // Output header (if any)
	if (substr($header, 0, 1) == '<') { // Assume header is already HTML and just paste
		echo $header;
	} else
		echo "<p>$header</p>";
} ?>
<? $this->Waveform->Form() ?>
