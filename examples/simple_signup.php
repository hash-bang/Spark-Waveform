<?
// WARNING: This example requires a writable 'temp' sub-directory if testing the 'avatar' upload field.

// Define the Waveform fields
require('../waveform.php');
$Waveform = new Waveform();
$Waveform->Group('Personal Details');
$Waveform->Define('name');
$Waveform->Define('email')
	->Email();
$Waveform->Define('age')
	->Type('int')
	->Min(18);
$Waveform->Group('Optional Info');
$Waveform->Define('sex')
	->Choice(array('m' => 'Male', 'f' => 'Female'));
$Waveform->Define('music_tastes')
	->Type('text');
$Waveform->Define('avatar')
	->File('temp')
	->Max('200kb');
?>

<? if ($Waveform->OK()) { // Everything is ok? ?>
	<h1>Thanks for signing up</h1>
	<p><pre><? print_r($_POST) ?></pre></p>
<? } else { // New page OR Something failed ?>
	<h1>Signup</h1>
	<?=$Waveform->Form()?>
<? } ?>
