 window.onload = function () {
      var container = document.getElementById('DynamicGraph_01');
      var list = document.getElementById('DynamicGraph');
      var buttons = document.getElementById('buttons').getElementsByTagName('span');
      var prev = document.getElementById('prev');
      var next = document.getElementById('next');
      var index = 1;
      var len = 5;
      var animated = false;
      var interval = 3000;
      var timer;


      function showbutton(){

            for(var i = 0; i  < buttons.length ;i++  )
            {
                  if(buttons[i].className == 'on')
                  {
                        buttons[i].className = '';
                        break;
                  }

            }
            buttons[index-1].className='on';

      }

      function animate(offset){
            animated = true;
            var nleft = parseInt(list.style.left) + offset;
            var time  =300;
            var interval =10;
            var speed = offset/(time/interval);

            function go(){
                  if((speed < 0 && parseInt(list.style.left) > nleft) || (speed > 0 && parseInt(list.style.left) <  nleft))
                  {
                        list.style.left = parseInt(list.style.left) + speed +'px';
                        setTimeout(go,interval);
                  }
                  else
                  {
                        animated = false;
                        list.style.left =nleft +'px';
                        if(nleft > -1800)
                        {
                        list.style.left = -6600 +'px';
                        } 
                        if(nleft < -6600)
                        {
                              list.style.left = -1800 +'px';
                        } 

                  }
            }
             go();
      }

     
      function play()
      {
            timer = setInterval(function(){ next.onclick() } , 3000)
      }

      function stop()
      {
            clearInterval(timer);
      }
     


      next.onclick = function(){


            if(index == 5)
            {
                  index=1;
            }
            else
            {

                  index += 1;
            }

            showbutton();
            if(!animated)
            {
                  animate(-1200);
            }

            
      }

      prev.onclick = function(){

             if(index == 1)
            {
                  index=5;
            }
            else
            {

                  index -= 1;
            }
             showbutton();

            if(!animated)
            {
                  animate(1200);
            }
                    
      }


      for(var i=0;i < buttons.length;i++ )
      {
            buttons[i].onclick = function()
            {
                  var myindex = parseInt(this.getAttribute('index'));
                  var offset = -1200*(myindex - index);
                  
                  index = myindex;
                  showbutton();
                  if(!animated){
                        animate(offset);
                  }
                 
            }
      }

   

      play();
      container.onmouseover = stop;
      container.onmouseout = play;


}