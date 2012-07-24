<script type="text/javascript">
	$(document).ready(function() {
		opciones = new Array();
		<?php

			foreach($nerSubtags as $key=>$subtag_array){
					echo "opciones[".$key."] = '';\n";
				foreach($subtag_array as $kk => $subtag){
					echo "opciones[".$key."] += '<option value=\'".$kk."\'>".$subtag."</option>'\n";
				}
			}
		?>
		$("select").chosen();
		$("select[name$='[ner_tag_id]']").change(function(){
	 	    name = this.name;
	 	    tmp = name.split("]");
	 	    tmp = tmp[1].split("[");
	 	    tmp = tmp[1];
	 	    id = "TweetsUser"+tmp+"NerSubtagId";
	 	    name = "data[TweetsUser]["+tmp+"][ner_subtag_id]"
			$("td[id='"+tmp+"']").empty();
	 	    opcion = $(this).find("option:selected").val();
	 	    $("select[name$='["+tmp+"][ner_subtag_id]']").empty();
	 	    select_ = "<select name = '"+name+"' id = '"+id+"' style='vertical-align:middle;margin:auto 0;width:150px'></select>";
	 	    //alert(select_);
	 	    $("td[id='"+tmp+"']").append(select_);
	 	    $("select[name$='["+tmp+"][ner_subtag_id]']").append(opciones[opcion]);
	 	    $("select[name$='["+tmp+"][ner_subtag_id]']").chosen();

	 	    $("select[name$='[ner_subtag_id]']").change(function(){
				/*If is "otro" change it to a input text box*/
				//This is for the deletion of the select box
				valor = $(this).find("option:selected").text()
				if (valor == 'Otro'){
					name = this.name;
			 	    tmp = name.split("]");
			 	    tmp = tmp[1].split("[");
			 	    tmp = tmp[1];
					//alert($(this).find("option:selected").text());
					id = $(this).attr('id');
					name = $(this).attr('name');
					//alert(id+ " " + name);
			 	    $("td[id='"+tmp+"']").empty();
					//construct the new input box
					input = "<input type='text' name = '"+name+"' id = '"+id+"' style='vertical-align:middl;margin:auto 0;width:93%;'>";
					$("td[id='"+tmp+"']").append(input);
					$("td[id='"+tmp+"']").css('position','relative');
				}
			});
		 		 	
		 })
		// $("select[name$='[ner_subtag_id]']").change(function(){
		// 	/*If is "otro" change it to a input text box*/
		// 	//This is for the deletion of the select box
		// 	name = this.name;
	 // 	    tmp = name.split("]");
	 // 	    tmp = tmp[1].split("[");
	 // 	    tmp = tmp[1];
		// 	//alert($(this).find("option:selected").text());
		// 	id = $(this).attr('id');
		// 	name = $(this).attr('name');
		// 	//alert(id+ " " + name);

		// 	//construct the new input box
		// 	input = "<input type='text' name = '"+name+"' id = '"+id+"' style='vertical-align:middl;margin:auto 0;'>";
		// 	$("td[id='"+tmp+"']").append(input);
		// 	$("td[id='"+tmp+"']").css('position','relative');
		// });
	});
	

</script>
<div class="container">
	<div class="sixteen columns">
	<h1 style="text-align:center"><?php echo __('Etiquetando un tweet'); ?></h1>
	<?php
		if(!$tweet){
			echo "Gracias por participar. Todo el corpus ha sido etiquetado.";
	?>
	</div>

	</div>
	<?php
			exit();
		}
	?>
		<?php echo $this->Form->create('TweetsUser');?>
			<div style="margin: 0 auto 0 auto;">
			<fieldset>
				<div class="tweet"><?php echo $tweet['Tweet']['tweet'];?></div>
				<?php
						//chopping data
						$tweet_explode = preg_split("/[\s,]+/",$tweet['Tweet']['tweet']);
						echo "<table class='choppedTweet'>";
						echo "<tr>";
							echo "<th class='tweet_part'>Tweet</th><th class='pos'>Parte del discurso</th><th class='ner'>Entidad nombrada</th><th class='ner_subtag'>Especialización E.N.</th><th class='join'>¿Unidas?</th>";

						echo "</tr>";


						$i = 0;
						foreach ($tweet_explode as $word){
							echo $this->Form->hidden('TweetsUser.'.$i.'.word',array('value'=>$word));
							echo $this->Form->hidden('TweetsUser.'.$i.'.user_id',array('value'=>$user));
							echo $this->Form->hidden('TweetsUser.'.$i.'.position_tweet',array('value'=>($i+1)));
							echo $this->Form->hidden('TweetsUser.'.$i.'.tweet_id',array('value'=>$tweet['Tweet']['id']));
							//*Giving some info to the user*//
							$def = "15";
							//Reconocimiento de articulos
							$articulos = array('el','la','los','las',
											   'un','una','unos', 'unas',
											   'lo','del','al'
											);
							if(array_search(strtr(strtolower($word), "áéíóú", "aeiou"), $articulos)){
								$def = 1;
							}
							//Fin de reconocimiento de articulos
							
							//Reconocimiento de preposiciones
							$preposiciones = array("a","ante","bajo","cabe",'con','contra','desde','durante',
												   "en",'entre','excepto','hacia','hasta','mediante','para','por',
												   'pro','salvo','segun','sin','so','sobre','tras','via'
								);
							if(array_search(strtr(strtolower($word), "áéíóú", "aeiou"), $preposiciones)){
								$def = 7;
							}
							//Reconocimiento de hashtags
							if(preg_match('/^@[A-Za-z0-9]/' , $word) == 1){
								$def = 12;
							}
							if(preg_match('/^#[A-Za-z0-9]/', $word) == 1){
								$def = 11;
							}
							if(strstr(strtolower($word),"rt")){
								$def = 10;
							}
							if(strstr($word,"/") || strstr($word,"//")){
								$def = 14;
							}
							if(preg_match('/^http?:\/\//i',$word) == 1){
								$def = 13;
							}

							// if(strstr($word, "#")){
							// 	$def = 11;
							// }
							// if(strstr($word,"@")){
							// 	$def = "12";
							// }
							//Fin de reconocimiento de hashtags

							echo $this->Html->tableCells(
									array(
											$word,
											$this->Form->input('TweetsUser.'.$i.'.tag_id',array('label'=>'','default'=>$def)),
											$this->Form->input('TweetsUser.'.$i.'.ner_tag_id',array('label'=>'','default'=>15)),
											array($this->Form->input('TweetsUser.'.$i.'.ner_subtag_id',array('type'=>'select','options'=>array('Ninguno'),'label'=>'')),array('id'=>$i)),
											$this->Form->input('TweetsUser.'.$i.'.linked',array('label'=>'','type'=>'checkbox','class'=>'checkbox'))
										),
									array(
										'class'=>'altrow'

									)
								);
							$i++;
						}
						echo "</table>";
					?>
			</fieldset>
			</div>
		<?php echo $this->Form->end(__('Enviar'));?>
	</div>
</div>
