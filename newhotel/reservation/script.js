var purchased=new Array();
var totalprice=0;

$(document).ready(function(){
	
	$('.product').simpletip({
		
		offset:[40,0],
		content:'<img src="img/ajax_load.gif" alt="loading" style="margin:10px;" />',
		onShow: function(){
			
			var param = this.getParent().find('img').attr('src');
			
			if($.browser.msie && $.browser.version=='6.0')
			{
				param = this.getParent().find('img').attr('style').match(/src=\"([^\"]+)\"/);
				param = param[1];
			}
			
			this.load('ajax/tips.php',{img:param}); 
		} 

	});
	
	$(".product img").draggable({
	
	containment: 'document',
	opacity: 0.6,
	revert: 'invalid',
	helper: 'clone',
	zIndex: 100
	
	});

	$("div.content.drop-here").droppable({
	
			drop:
					function(e, ui)
					{
						var param = $(ui.draggable).attr('src');
						
						if($.browser.msie && $.browser.version=='6.0')
						{
							param = $(ui.draggable).attr('style').match(/src=\"([^\"]+)\"/);
							param = param[1];
						}

						addlist(param);
					}
	
	});

});


function addlist(param)
{
	$.ajax({
	type: "POST",
	url: "ajax/addtocart.php",
	data: 'img='+encodeURIComponent(param),
	dataType: 'json',
	beforeSend: function(x){$('#ajax-loader').css('visibility','visible');},
	success: function(msg){
		
		$('#ajax-loader').css('visibility','hidden');
		if(parseInt(msg.status)!=1)
		{
			return false;
		}
		else
		{
			var check=false;
			var cnt = false;
			
			for(var i=0; i<purchased.length;i++)
			{
				if(purchased[i].id==msg.id)
				{
					check=true;
					cnt=purchased[i].cnt;
					
					break;
				}
			}
			
			if(!cnt)
				$('#item-list').append(msg.txt);
				
			if(!check)
			{
				purchased.push({id:msg.id,cnt:1,price:msg.price});
			}
			else
			{
				if(cnt>=3) return false;
				
				purchased[i].cnt++;
				$('#'+msg.id+'_cnt').val(purchased[i].cnt);
			}
			
			totalprice+=msg.price;
			update_total();

		}
		
		$('.tooltip').hide();
	
	}
	});
}

function findpos(id)
{
	for(var i=0; i<purchased.length;i++)
	{
		if(purchased[i].id==id)
			return i;
	}
	
	return false;
}

function remove(id)
{
	var i=findpos(id);

	totalprice-=purchased[i].price*purchased[i].cnt;
	purchased[i].cnt = 0;

	$('#table_'+id).remove();
	update_total();
}

function change(id)
{
	var i=findpos(id);
	
	totalprice+=(parseInt($('#'+id+'_cnt').val())-purchased[i].cnt)*purchased[i].price;
	
	purchased[i].cnt=parseInt($('#'+id+'_cnt').val());
	update_total();
}

function update_total()
{
	if(totalprice)
	{
		$('#total').html('total: $'+totalprice);
		$('a.button').css('display','block');
	}
	else
	{
		$('#total').html('');
		$('a.button').hide();
	}
}