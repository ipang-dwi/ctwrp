<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="UTF-8">
    <title>Preview ctwrp by ipang-dwi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="http://www.firstplato.com/img/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="https://ipang-dwi.github.io/ctwrp/stylesheets/normalize.css" media="screen">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://ipang-dwi.github.io/ctwrp/stylesheets/stylesheet.css" media="screen">
    <link rel="stylesheet" type="text/css" href="https://ipang-dwi.github.io/ctwrp/stylesheets/github-light.css" media="screen">
  </head>
  <body>
    <section class="page-header">
      <h1 class="project-name">Ctwrp</h1>
      <h2 class="project-tagline">php currency to word on Rupiah (IDR)</h2>
      <a href="https://github.com/ipang-dwi/ctwrp" class="btn">View on GitHub</a>
	  <!--a href="ctw2.php" class="btn">Preview</a-->
      <a href="https://github.com/ipang-dwi/ctwrp/zipball/master" class="btn">Download .zip</a>
      <a href="https://github.com/ipang-dwi/ctwrp/tarball/master" class="btn">Download .tar.gz</a>
    </section>

    <section class="main-content">
      <h1>
<a id="ctwrp" class="anchor" href="#ctwrp" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>ctwrp</h1>

<center>
<form method="post" target="_self">
	Masukkan nilai yang kamu inginkan
	<input type="text" name="val" id="val" <?php if($_POST) echo 'placeholder="'.$_POST["val"].'"';?>/>
	<input type="submit" name="OK" id="OK" value="OK, proses bro.."/>
</form>
</br><hr>

<?php
if($_POST&&$_POST['val']!=''){
	$cur = $_POST['val'];				// iki input e bro..
	rupiah($cur);
	echo "<i><b>".ctw($cur,2)."</b></i>";
}
function rupiah($cur){					// bwt nampilin format rupiah
	echo "Rp. ".number_format($cur, 0, ',', '.').",-</br>";
}
function ctw($cur,$f){
	$l = strlen($cur);
	$c = str_split($cur);
	$w = '';
	$counter = 1;
	$no = 1;
	$non = 1;
	$nonj = 1;
	$nonm = 1;
	$nont = 1;
	$nonb = 1;
	for($i=0;$i<$l;$i++){
		$dec = $l-$i;
		if($c[$i]==1) $v = "satu ";
		if($c[$i]==2) $v = "dua ";
		if($c[$i]==3) $v = "tiga ";
		if($c[$i]==4) $v = "empat ";
		if($c[$i]==5) $v = "lima ";
		if($c[$i]==6) $v = "enam ";
		if($c[$i]==7) $v = "tujuh ";
		if($c[$i]==8) $v = "delapan ";
		if($c[$i]==9) $v = "sembilan ";
		if($c[$i]==0) $v = "";
		if($dec==17){					// puluhan bilyar
			if($v=="satu "){				
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$nonb = 0;
			}
			else if($v=="") $w = $w."";
			else
				$w = $w."".$v." puluh ";
		}
		if($dec==16){					// bilyar
			if($nonb==1){ 
				if($v==""&&$c[$i-1]==0&&$c[$i-2]==0) $w = $w."";
				else $w = $w."".$v." bilyar ";
			}  
			else $w = $w."bilyar ";
		}
		if($dec==14){					// puluhan trilyun
			if($v=="satu "){				
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$nont = 0;
			}
			else if($v=="") $w = $w."";
			else
				$w = $w."".$v." puluh ";
		}
		if($dec==13){					// trilyun
			if($nont==1){ 
				if($v==""&&$c[$i-1]==0&&$c[$i-2]==0) $w = $w."";
				else $w = $w."".$v." trilyun ";
			}  
			else $w = $w."trilyun ";
		}
		if($dec==11){					// puluhan milyar
			if($v=="satu "){				
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$nonm = 0;
			}
			else if($v=="") $w = $w."";
			else
				$w = $w."".$v." puluh ";
		}
		if($dec==10){					// milyar
			if($nonm==1){ 
				if($v==""&&$c[$i-1]==0&&$c[$i-2]==0) $w = $w."";
				else $w = $w."".$v." milyar ";
			} 
			else $w = $w."milyar ";
		}
		if($dec==8){					// puluhan juta
			if($v=="satu "){				
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$nonj = 0;
			}
			else if($v=="") $w = $w."";
			else
				$w = $w."".$v." puluh ";
		}
		if($dec==7){					// jutaan
			if($nonj==1){ 
				if($v==""&&$c[$i-1]==0&&$c[$i-2]==0) $w = $w."";
				else $w = $w."".$v." juta ";
			}
			else $w = $w."juta ";
		}
		if($dec==5){					// puluhan ribu
			if($v=="satu "){
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$non = 0;
			}
			else if($v=="") $w = $w."";
			else
				$w = $w."".$v." puluh ";
		}
		if($dec==4){					// ribuan
			if($non==1){
				if($v=="satu "&&$l==4) $w = $w."seribu ";
				else if($v==""&&$c[$i-1]==0&&$c[$i-2]==0) $w = $w."";
				else $w = $w."".$v." ribu ";
			} 
			else $w = $w."ribu ";
		} 
		// ratusan, ratusan ribu, ratusan juta, ratusan milyar, ratusan trilyun, ratusan bilyar >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
		if($dec==3||$dec==6||$dec==9||$dec==12||$dec==15||$dec==18){	
			if($v=="satu ") $w = $w."seratus ";
			else if($v=="") $w = $w."";
			else $w = $w."".$v." ratus ";
		} 
		if($dec==2){					// puluhan
			if($v=="satu "){
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$no = 0;
			}
			else if($v=="") $w = $w."";
			else $w = $w."".$v." puluh ";
		} 
		if($dec==1){					// satuan
			if($no==0) $w = $w."";
			else $w = $w."".$v;
		}
		
	}
	$w = $w." rupiah";
	if($f==0) return $w;
	else if($f==1) return ucfirst($w);
	else if($f==2) return ucwords($w);
}
?>
</center></br><hr>

<p>php currency to word on Rupiah (IDR)</p>

<p>========================= Indonesia</br> 
Fungsi PHP untuk konversi dari nilai mata uang ke kalimat 'terbilang', dalam format Rupiah, mata uang Indonesia.
Sebelumnya sudah mencoba dengan fungsi PHP dari PhpStorm yang dibuat oleh Sakthikarthi, 
namun karena memang bahasa Indonesia menerapkan struktur penyusunan kata yang berbeda 
dalam penyebutan terbilang nilai uang. Maka terpaksa ane bwt sendiri fungsi baru,
dikejar deadline juga soalnya, user mintanya dalam bahasa Indonesia di App nya.
Biar lebih bermanfaat bila ada yang perlu atau pengen diconvert ke bahasa pemrograman laen,
jadi ane putusin bwt di share di sini. :)</p>

<p>========================= English</br> 
PHP function to convert currency to words, in Rupiah's / IDR (Indonesian Money Currency).
I was try other PHP function from PHPStorm by Sakthikarthi, but Indonesian language implements
different words structure in currency's spelling. So I decide to create new function by myself,
coz I was hit the deadline, my client still wants his App in Indonesian.
I think it 'll be usefull to share it, may another user needs it or wanna to convert it 
to other programming language. :)   </p>

<p>feel free to reach me on :
</br><a href="www.firstplato.com" target=_blank>www.firstplato.com</a>
</br><a href="mailto:admin@firsplato.com">admin@firsplato.com</a></p>

      <footer class="site-footer">
        <span class="site-footer-owner"><a href="https://github.com/ipang-dwi/ctwrp">Ctwrp</a> is maintained by <a href="https://github.com/ipang-dwi">ipang-dwi</a>.</span>

        <span class="site-footer-credits">This page was generated by <a href="https://pages.github.com">GitHub Pages</a> using the <a href="https://github.com/jasonlong/cayman-theme">Cayman theme</a> by <a href="https://twitter.com/jasonlong">Jason Long</a>.</span>
      </footer>

    </section>

  
  </body>
</html>
