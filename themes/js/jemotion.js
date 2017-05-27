// jQuery Plugins: jEmotion 2.3
// Copyright @ www.phpbasic.com
// View http://jquery.phpbasic.com/jemotion for new version

(function($) {
	$.fn.emotions = function(settings,more_emotions) {
		var _cfg = {
			handle: 'a',
			dir: 'emotions/',
			//label: 'Click here to show emotion icons',
			style: null,
			cls: null,
			r_alert: 1,
			emotions: [
				 {syntax: '[01]',title: 'Devil',icon: '1.gif'},
				 {syntax: '[02]',title: 'Crying',icon: '2.gif'},
				 {syntax: '[03]',title: 'batting eyelashes',icon: '3.gif'},
				 {syntax: '[04]',title: 'big hug',icon: '4.gif'},
				 {syntax: '[05]',title: 'cowboy',icon: '5.gif'},
				 {syntax: '[06]',title: 'big grin',icon: '6.gif'},
				 {syntax: '[07]',title: 'confused',icon: '7.gif'},
				 {syntax: '[08]',title: 'love struck',icon: '8.gif'},
                 {syntax: '[09]',title: 'love struck',icon: '9.gif'},
				 {syntax: '[10]',title: 'phbbbbt',icon: '10.gif'},
				 {syntax: '[11]',title: 'kiss',icon: '11.gif'},
				 {syntax: '[12]',title: 'broken heart',icon: '12.gif'},
				 {syntax: '[13]',title: 'surprise',icon: '13.gif'},
				 {syntax: '[14]',title: 'at wits\' end',icon: '14.gif'},
				 {syntax: '[15];',title: 'smug',icon: '15.gif'},
				 {syntax: '[16]',title: 'cool',icon: '16.gif'},
				 {syntax: '[17]',title: 'nail biting',icon: '17.gif'},
				 {syntax: '[18]',title: 'whew!',icon: '18.gif'},
				 {syntax: '[19]',title: 'laughing',icon: '19.gif'},
				 {syntax: '[20]',title: 'sad',icon: '20.gif'},
				 {syntax: '[21]',title: 'raised eyebrows',icon:'21.gif'},
				 {syntax: '[22]',title: 'yawn',icon: '22.gif'},
				 {syntax: '[23]',title: 'on the phone',icon: '23.gif'},
				 {syntax: '[24]',title: 'rolling on the floor',icon: '24.gif'},
				 {syntax: '[25]',title: 'angel',icon: '25.gif'},
				 {syntax: '[26]',title: 'nerd',icon: '26.gif'},
				 {syntax: '[27]',title: 'talk to the hand',icon: '27.gif'},
                 {syntax: '[28]',title: 'talk to the hand',icon: '28.gif'},
				 {syntax: '[29]',title: 'rolling eyes',icon: '29.gif'},
				 {syntax: '[30]',title: 'loser',icon: '30.gif'},
				 {syntax: '[31]',title: 'sick',icon: '31.gif'},
			]
		};
		if(settings) $.extend(_cfg, settings);
		var obj = this;
		var default_label = $(_cfg.handle).html();
		var default_style = $(_cfg.handle).attr('style');
		var default_css = $(_cfg.handle).attr('class');
		var funct = {
			__regexp: function(str){
				return str.replace(/(\.|\\|\+|\*|\?|\[|\^|\]|\$|\(|\)|\{|\}|\=|\!|\<|\>|\||\:|\-)/ig,"\\$1");
			},
			__load: function(){ // apply emotion
				if(more_emotions){
					$.each(more_emotions,function(id,val){
						if(_cfg.r_alert && _cfg.emotions[id]){
							if(confirm('Emotion '+id+'.'+_cfg.emotion_ext+' <=> '+_cfg.emotions[id]+' does exists. Do you want to replace it by '+val+' ?')) _cfg.emotions[id] = val;
						}else{
							_cfg.emotions[id] = val;
						}
					});
				}
				obj.each(function(){
					var str = $(this).html();
					$.each(_cfg.emotions,function(iEM,bbcode){
						str = str.replace(new RegExp(funct.__regexp(bbcode.syntax),'ig'),'<span class="emotion_show '+iEM+'"><img  src="'+_cfg.dir+bbcode.icon+'" title="'+bbcode.title+'" /></span>');
					});
					$(this).html(str);
					$(_cfg.handle).html(default_label).attr({'style':default_style}).addClass(default_css);
				})
			},
			__remove: function(){ // remove emotion
				$(obj).find('span.emotion_show').each(function(){
					var iE = Number(this.className.split('emotion_show ')[1]);
					$(this).attr({'class':''}).addClass('emotion_hide '+iE).html(_cfg.emotions[iE].syntax);		
				});
				$(_cfg.handle).html(_cfg.label).attr({'style':_cfg.style}).addClass(_cfg.cls);
			},
			__again: function(){
				$(obj).find('span.emotion_hide').each(function(){
					var iE = Number(this.className.split('emotion_hide ')[1]);
					$(this).attr({'class':''}).addClass('emotion_show '+iE).html('<img  src="'+_cfg.dir+_cfg.emotions[iE].icon+'" title="'+_cfg.emotions[iE].title+'" />');
				});
				$(_cfg.handle).html(default_label).attr({'style':default_style}).addClass(default_css);
			}
		};
		
		$(_cfg.handle).toggle(funct.__remove,funct.__again);
		funct.__load();
		return false;
	};
})(jQuery)