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
				<div class="tweet"><?php echo utf8_decode($tweet['Tweet']['tweet']);?></div>
				<?php
						//chopping data
						// $tweet_explode = preg_split("/[\s,]+/",$tweet['Tweet']['tweet']);
						echo "<table class='choppedTweet'>";
						echo "<tr>";
							echo "<th class='tweet_part'>Tweet</th><th class='pos'>Parte del discurso</th><th class='ner'>Entidad nombrada</th><th class='ner_subtag'>Especialización E.N.</th><th class='join'>¿Unidas?</th>";

						echo "</tr>";


						$i = 0;
						foreach ($tweetUsers as $word){
							$word = $word['TweetsUser'];
							echo $this->Form->hidden('TweetsUser.'.$i.'.id',array('value'=>$word['id']));
							echo $this->Form->hidden('TweetsUser.'.$i.'.word',array('value'=>utf8_decode($word['word'])));
							echo $this->Form->hidden('TweetsUser.'.$i.'.user_id',array('value'=>$user));
							echo $this->Form->hidden('TweetsUser.'.$i.'.position_tweet',array('value'=>($i+1)));
							echo $this->Form->hidden('TweetsUser.'.$i.'.tweet_id',array('value'=>$tweet['Tweet']['id']));
							//Fin de reconocimiento de hashtags
							
							echo $this->Html->tableCells(
									array(
											utf8_decode($word['word']),
											$this->Form->input('TweetsUser.'.$i.'.tag_id',array('label'=>'','default'=>$word['tag_id'])),
											$this->Form->input('TweetsUser.'.$i.'.ner_tag_id',array('label'=>'','default'=>$word['ner_tag_id'])),
											array($this->Form->input('TweetsUser.'.$i.'.ner_subtag_id',array('type'=>'select','options'=>array('Ninguno'),'label'=>'')),array('id'=>$i)),
											$this->Form->input('TweetsUser.'.$i.'.linked',array('label'=>'','type'=>'checkbox','class'=>'checkbox', 'checked'=> $word['linked'] == 1? true:false))
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
