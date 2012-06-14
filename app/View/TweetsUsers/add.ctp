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
		$("select[name$='[ner_tag_id]']").change(function(){
	 	    name = this.name;
	 	    tmp = name.split("]");
	 	    tmp = tmp[1].split("[");
	 	    select = tmp[1];
	 	    opcion = $(this).find("option:selected").val();
	 	    $("select[name$='["+select+"][ner_subtag_id]']").empty();
	 	    $("select[name$='["+select+"][ner_subtag_id]']").append(opciones[opcion]);

		 		 	
		 })
	});
	

</script>
<div class="container">
	<div class="sixteen columns">
	<h1 style="text-align:center"><?php echo __('Etiquetando un tweet'); ?></h1>
		<?php echo $this->Form->create('TweetsUser');?>
			<div style="margin: 0 auto 0 auto;">
			<fieldset>
				<div class="tweet"><?php echo $tweet['Tweet']['tweet'];?></div>
				<?php
						//chopping data
						$tweet_explode = explode(" ", $tweet['Tweet']['tweet']);
						echo "<table class='choppedTweet'>";
						echo $this->Html->tableHeaders(array('Tweet part','POS','Entidad Nombrada', 'Sub tag' , 'Palabras unidas'));
						$i = 0;
						foreach ($tweet_explode as $word){
							echo $this->Form->hidden('TweetsUser.'.$i.'.user_id',array('value'=>$user));
							echo $this->Form->hidden('TweetsUser.'.$i.'.position_tweet',array('value'=>($i+1)));
							echo $this->Form->hidden('TweetsUser.'.$i.'.tweet_id',array('value'=>$tweet['Tweet']['id']));
		
		
							echo $this->Html->tableCells(
									array(
											$word,
											$this->Form->input('TweetsUser.'.$i.'.tag_id',array('label'=>'')),
											$this->Form->input('TweetsUser.'.$i.'.ner_tag_id',array('label'=>'','default'=>15)),
											$this->Form->input('TweetsUser.'.$i.'.ner_subtag_id',array('type'=>'select','options'=>array('Ninguno'),'label'=>'')),
											$this->Form->input('TweetsUser.'.$i.'.linked',array('label'=>'','type'=>'checkbox','class'=>'checkbox'))
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
