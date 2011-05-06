<?
// WARNING: This example requires a writable 'temp' sub-directory.

// Define the Waveform fields
require('../waveform.php');
$Waveform = new Waveform();
$Waveform->Define('name')
	->Default('My Kitty');
$Waveform->Define('description')
	->NotRequired()
	->Type('text')
	->Default('This is my cat, there are many like it but this one is mine.');
$Waveform->Define('picture')
	->File('temp');
?>

<? if ($Waveform->OK()) { // Everything is ok? ?>
	<h1><?=$_POST['name']?></h1>
	<p><?=$_POST['description']?></p>
	<p><img src="<?=$_POST['picture']?>"/></p>
<? } else { // New page OR Something failed ?>
	<h1>Post pictures of your cats!</h1>
	<p>Because, God knows there isn't enough on the net!</p>
	<?=$Waveform->Form()?>
<? } ?>
