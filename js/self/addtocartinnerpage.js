var storage = localStorage;

function doFirst(){
    if(storage['addItemList'] == null){
		storage['addItemList'] = '';		//storage.setItem('addItemList','');
	}
    var addbtn = document.querySelector('.addtocart');	
        addbtn.addEventListener('click', function(){
            var productinfo = document.querySelector('#'+this.id+' input').value;
            // console.log(this);
            // console.log(productinfo);
            addItem(this.id,productinfo);    
            // console.log(this.id,productinfo)
            // console.log(storage['addItemList'])      
		});
}

function addItem(itemId,itemValue){
    if(storage[itemId]){
        alert('You have checked.');
    }else{
        storage[itemId] = itemValue;
        storage['addItemList'] += itemId + ', ';
        // console.log(storage['addItemList'])       
    }
}

window.addEventListener('load',doFirst);