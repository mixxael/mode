<?php
/**
 * @package WordPress
 * @subpackage Modeinua Theme
 */

get_header(); ?>
	<div id="content" class="narrowcolumn">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<?php if (!is_front_page()) { ?><h2><?php the_title(); ?></h2><?php } ?>
			<div class="entry">
				<table><tr>
				<td valign="top">
					<?php the_content('Читать полностью &raquo;'); 
	
					?>
				</td>
				<td valign="top">
					<?php $index_thumbnail = get_post_meta($post->ID, 'big_img', true);
						if ($index_thumbnail) echo "<div  class='caption'><img src='$index_thumbnail' /></div>";?>
				</td></tr></table>
				<!--
				<form method="post" name="kuh"> 
					<div class="calc"> 
					
					<!-- Для просчета выбирите ИЗДЕЛИЕ  
							Конфигурацию ИЗДЕЛИЯ - прямая КУХНЯ, угловая
						->
						<div class="size2"> Высота антресолей <select name="sizez">
						  <option value="1" selected="selected">720</option>
						   <option value="1.1">920</option>
							</select>	</div>

						
						<div class="size"><div class="uptop"> ФАСАД верх </div>
							<select name="sizez">
								<option value="1" selected="selected">МАСИВ ясень</option>
								<option value="1.1">920</option>
							</select>	
						</div>
						 
						<div class="size"><div class="uptop"> Сторона X </div><input type="number" name="sx" value="1000">
						 <div class="sm">мм. </div></div>

						   
						<div class="size1"><div class="uptop"> Сторона Y </div><input type="number" value="0" name="sy"><div class="sm">мм. </div>
											</div> 


						<div class="right">
						<div>
						 Материал&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="material">
						<option value="100" selected="selected">ДСП Krono</option>
						<option value="110">ДСП Egger</option>
										</select></div>
							  

						<div>Столешница&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="stol">
						<option value="28">28 </option>
						<option value="38">38 </option>
									   </select></div>
						  
							
						<div>Фурнитура&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="furnitura">
						<option value="15">Польша</option>
						<option value="20">Германия</option>
						<option value="10">Китай</option>

						</select></div>     

						<div>Витражи&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="vitrag">
						<option value="1" selected="selected">нет</option>
							  <option value="25">от 0 до 2</option>
						 <option value="45">от 3 до 5</option>
							  <option value="70">от 6 до 8</option>
							</select>		</div>

						<div>Фасад&nbsp;&nbsp;&nbsp;&nbsp;<select name="fasad">
						<option value="72.5" selected="selected">ДСП</option>
						<option value="108">МДФ</option> <option value="158">Натуральный Дуб</option>
						</select></div> 

						<div>Карниз&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="karniz">
							  <option value="0" selected="selected">нет</option>
							  <option value="8">одинарный</option>
							  <option value="16">двойной</option>
							</select>		</div>  

						<div>Подсветка&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="svet">
							  <option value="0" selected="selected">нет</option>
							  <option value="5">есть</option>
							</select>		</div>

						<div>Барная стойка&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="bar">
							  <option value="0" selected="selected">нет</option>
							  <option value="80">есть</option>
							</select></div>
						<br> 
						<div>

						<script language="JavaScript" type="text/javascript">
						document.write('<input type="button" value="Расчитать cтоимость" onclick="calc1()">');
							</script><input type="button" value="Расчитать cтоимость" onclick="calc1()">

						<input name="dengi" type="text" size="24" readonly="readonly">  грн.  </div>
						</div>


						<div><br><br><br><br><br><br><br><br><br><p>Обращаем Ваше внимание! Так как очень сложно заранее предусмотреть все <br>нюансы, сумма, рассчитанная с помощью этого калькулятора, достаточно<br> условна и не является окончательной.</p>
						<p style="text-align: justify;">Стоимость наших услуг согласовывается с клиентом при встрече и <br>обсуждении деталей сотрудничества.</p></div>					<div class="clear"></div>
					</div>
				</form>
				-->
				
				<?php //the_content('<p class="serif">Читать полностью &raquo;</p>'); ?>

				<?php //wp_link_pages(array('before' => '<p><strong>Страницы:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>

	
	</div>
<script language="javascript">
	jQuery(document).ready(function($){
		$(".wpcc_description_2").hide();
		$(".wpcc_select_2").hide();
		
		$(".wpcc_inputtext_10").val('4,1');
		//console.log($(".wpcc_inputtext_10").val());
		$(".wpcc_description_11").hide();
		$(".wpcc_inputtext_11").hide();
		
		
		//меняем прямая/угловая
		$(".wpcc_select_8").change(function () {
			var str = "";
			$(".wpcc_select_8 option:selected").each(function () {
					str += $(this).val() + " ";
			});
			//$("div").text(str);
			//console.log(str);
			if(str == 2){ //угловая
				$(".wpcc_description_11").show();
				$(".wpcc_inputtext_11").show();
				$(".wpcc_text_6").hide();
				$(".wpcc_text_12").show();
				$(".wpcc_inputtext_10").val('2,7');
				$(".wpcc_description_10 span").html('2,7');
				
			}else{
				$(".wpcc_description_11").hide();
				$(".wpcc_inputtext_11").hide();
				$(".wpcc_inputtext_11").val('0');
				$(".wpcc_text_12").hide();
				$(".wpcc_text_6").show();
				$(".wpcc_inputtext_10").val('4,1');
				$(".wpcc_description_10 span").html('4,1');
			}
		})
		.change();
		
		//меняем 900мм или 720мм
		$(".wpcc_select_9").change(function () {
			var str = "";
			$(".wpcc_select_9 option:selected").each(function () {
					str += $(this).text() + " ";
			});
			//$("div").text(str);
			//console.log(str);
			if(str == 720){
				$(".wpcc_description_2").show();
				$(".wpcc_select_2").show();
				$(".wpcc_select_4 [value='0']").attr("selected", "selected");
				$(".wpcc_description_4").hide();
				$(".wpcc_select_4").hide();
				
			}else{
				$(".wpcc_description_4").show();
				$(".wpcc_select_4").show();
				$(".wpcc_select_2 [value='0']").attr("selected", "selected");
				$(".wpcc_description_2").hide();
				$(".wpcc_select_2").hide();
			}
		})
		.change();

});	
</script>
<script language="javascript">
	function calc1(){
		m0=eval(document.kuh.material.value);
		f0=eval(document.kuh.furnitura.value);
		s0=eval(document.kuh.fasad.value);
		t0=eval(document.kuh.stol.value);
		g0=eval(document.kuh.vitrag.value);
		k0=eval(document.kuh.karniz.value);
		x1=eval(document.kuh.sx.value/1000);
	        y1=eval(document.kuh.sy.value/1000);
		//z1=eval(document.kuh.sizez.value);
		sv=eval(document.kuh.svet.value);
		bar=eval(document.kuh.bar.value);
		w0=0;
		if (y1>0)
			w0=0.6;

		//sum1=(((x1+y1-w0)*(m0+f0+s0+t0)+((x1+y1)*k0)+g0)*z1+sv+bar)*9.6;
		sum1=(((x1+y1-w0)*(m0+f0+s0+t0)+((x1+y1)*k0)+g0)+sv+bar)*9.6;
		sum11=parseInt(sum1);
		//check for error input
		if (x1<0.6) 
		window.alert("Значение X не может быть меньше 600 мм!");
		else
		document.kuh.dengi.value=sum11;
		
		//window.alert(sum11);
		}</script>
	
<?php //get_sidebar(); ?>

<?php get_footer(); ?>
