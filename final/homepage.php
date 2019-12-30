<?php

session_start();

if (!isset($_SESSION['username']))
	header('location:initialpage.html');

?>

<!DOCTYPE html>
<html>
<head>
	<title>main page</title>
	<link rel="stylesheet" type="text/css" href="css/newmain.css">
	<script type="text/javascript">
		const block = () => {

			const burger = document.querySelector('.burger');
			const sem = document.querySelector('.sem');
			const even = document.querySelector('.even');
			const odd = document.querySelector('.odd');
			const semex = document.querySelector('.semex');
			const evenex = document.querySelector('.evenex');
			const oddex = document.querySelector('.oddex');
			const note = document.querySelector('.note');
			const menu = document.querySelector('.menu');
			const navlist = document.querySelector('.navlist');
			const clear = document.querySelector(".clear");
	        const list = document.getElementById("list");
	        const input = document.getElementById("input");
	        const inputevenfolder = document.getElementById("inputevenfolder");
	        const inputoddfolder = document.getElementById("inputoddfolder");
	        const menu_remove = document.querySelector('.menu_remove');
	        const add = document.querySelector('.add');
	        const elist = document.querySelector('.elist');
	        const olist = document.querySelector('.olist');
	        const einsert = document.querySelector('.einsert');
	        const oinsert = document.querySelector('.oinsert');
	        const eadd = document.querySelector('.eadd');
	        const oadd = document.querySelector('.oadd');
	        const efinal = document.querySelector('.efinal');
	        const ofinal = document.querySelector('.ofinal');
	        const logout = document.querySelector('.logout');
	        const profile = document.querySelector('.profile');
	      
	        profile.addEventListener('click', () => {
	        	logout.classList.toggle('active');
	        	navlist.classList.remove('active');
				semex.classList.remove('active');
				evenex.classList.remove('active');
				oddex.classList.remove('active');
	        });

			burger.addEventListener('click',() => {
				navlist.classList.toggle('active');
				semex.classList.remove('active');
				evenex.classList.remove('active');
				oddex.classList.remove('active');
				eadd.classList.remove('active');
				oadd.classList.remove('active');
			});
			
			sem.addEventListener('click', () =>{
				semex.classList.toggle('active');
				evenex.classList.remove('active');
				oddex.classList.remove('active');
				eadd.classList.remove('active');
				oadd.classList.remove('active');
			});

			even.addEventListener('click', () =>{
				evenex.classList.toggle('active');
				oddex.classList.remove('active');
				eadd.classList.remove('active');
				oadd.classList.remove('active');
			});

			odd.addEventListener('click', () =>{
				oddex.classList.toggle('active');
				evenex.classList.remove('active');
				eadd.classList.remove('active');
				oadd.classList.remove('active');
			});

			note.addEventListener('click',() => {
				navlist.classList.toggle('active');
				menu.classList.add('active');
				navlist.classList.remove('active');
				semex.classList.remove('active');
				evenex.classList.remove('active');
				oddex.classList.remove('active');
			});

			menu_remove.addEventListener('click', () => {
          	 	const menu=document.querySelector('.menu');
           		menu.classList.remove('active');
       		 });

			einsert.addEventListener('click', () => {
				eadd.classList.toggle('active');
				evenex.classList.remove('active');
				oadd.classList.remove('active');
			});

			oinsert.addEventListener('click', () => {
				oadd.classList.toggle('active');
				oddex.classList.remove('active');
				eadd.classList.remove('active');
			});

			efinal.addEventListener('click', () => {
				eadd.classList.toggle('active');
				evenex.classList.add('active');
			});

			ofinal.addEventListener('click', () => {
				oadd.classList.toggle('active');
				oddex.classList.add('active');
			});

        const CHECK = "fa-check-circle";
        const UNCHECK = "fa-circle-thin";
        const LINE_THROUGH = "lineThrough";

        let LIST, id;

	    let data = localStorage.getItem("TODO");

	    if(data){
	        LIST = JSON.parse(data);
	        id = LIST.length; 
	        loadList(LIST); 
	    }else{
	        
	        LIST = [];
	        id = 0;
	    }

	    function loadList(array){
	        array.forEach(function(item){
	            addToDo(item.name, item.id, item.done, item.trash);
	        });
	    }

	    clear.addEventListener("click", function(){
	        localStorage.clear();
	        location.reload();
	    });

	    function addToDo(toDo, id, done, trash){
	        
	        if(trash){ return; }
	        
	        const DONE = done ? CHECK : UNCHECK;
	        const LINE = done ? LINE_THROUGH : "";
	        
	        const item = `<li class="item">
	                        <i class="fa ${DONE} co" job="complete" id="${id}"></i>
	                        <p class="text ${LINE}">${toDo}</p>
	                        <i class="fa fa-trash-o de" job="delete" id="${id}"></i>
	                      </li>
	                    `;
	        
	        const position = "beforeend";
	        
	        list.insertAdjacentHTML(position, item);
	    }

	    document.addEventListener("keyup",function(event){
	        if(event.keyCode == 13){
	            const toDo = input.value;
	            entry(toDo);
	           }
	    });

	    add.addEventListener('click',()=>{
	      const toDo = input.value;
	      entry(toDo);
	    });
	           
	    const entry = (toDo) =>{
	      if(toDo){
	        addToDo(toDo, id, false, false);
	                
	        LIST.push({
	                   name : toDo,
	                    id : id,
	                    done : false,
	                    trash : false
	                });
	                
	        localStorage.setItem("TODO", JSON.stringify(LIST));
	                
	        id++;
	      }
	           
	       input.value = "";
	    }
	       

	    function completeToDo(element){
	        element.classList.toggle(CHECK);
	        element.classList.toggle(UNCHECK);
	        element.parentNode.querySelector(".text").classList.toggle(LINE_THROUGH);
	        
	        LIST[element.id].done = LIST[element.id].done ? false : true;
	    }

	    
	    function removeToDo(element){
	        element.parentNode.parentNode.removeChild(element.parentNode);
	        
	        LIST[element.id].trash = true;
	    }


	    list.addEventListener("click", function(event){
	        const element = event.target; 
	        const elementJob = element.attributes.job.value; 
	        
	        if(elementJob == "complete"){
	            completeToDo(element);
	        }else if(elementJob == "delete"){
	            removeToDo(element);
	        }
	        
	        localStorage.setItem("TODO", JSON.stringify(LIST));
	    });

	    // ***********************************************//////

	    let LIST2, id2;

	    let data1 = localStorage.getItem("sems");

	    if(data1){
	        LIST2 = JSON.parse(data1);
	        id2 = LIST2.length; 
	        loadsems(LIST2); 
	    }else{
	        
	        LIST2 = [];
	        id2 = 0;
	    }

	    function loadsems(array){
	        array.forEach(function(item){
	            addsem(item.firstmonth, item.secondmonth, item.year, item.id2, item.trash);
	        });
	    }

	    function addsem(firstmonth,secondmonth,year, id2, trash){
	        
	        if(trash){ return; }
	        
	        const ele = `<li>
	                        <a href="result.html"><p class="text">${firstmonth} - ${secondmonth} (${year})</p></a>
	                        <i class="fa fa-trash-o de" job="delete" id="${id2}"></i>
	                      </li>
	                    `;
	        
	        const position = "beforeend";
	        
	        elist.insertAdjacentHTML(position, ele);
	    }

	    document.addEventListener("keyup",function(event){
	        if(event.keyCode == 13){
	            const firstmonth = first.value;
	            const secondmonth = second.value;
	            const year = year.value;
	            entry2(firstmonth,secondmonth,year);
	           }
	    });

	    efinal.addEventListener('click',()=>{
	      const firstmonth = first.value;
	      const secondmonth = second.value;
	      const year = year.value;
	      entry2(firstmonth,secondmonth,year);
	    });
	           
	    function entry2(firstmonth,secondmonth,year) {
	      if(firstmonth && secondmonth && year){
	        addsem(firstmonth,secondmonth,year,id2,false);
	                
	        LIST2.push({
	                   fmonth : firstmonth,
	                   smonth: secondmonth,
	                   y:year,
	                   this.id2 : id2,
	                   trash : false
	                });
	                
	        localStorage.setItem("sems", JSON.stringify(LIST2));
	                
	        id++;
	      }
	           
	       input.value = "";
	    }

	    
	    function removesem(element){
	        element.parentNode.parentNode.removeChild(element.parentNode);
	        
	        LIST[element.id].trash = true;
	    }


	    list.addEventListener("click", function(event){
	        const element = event.target; 
	        const elementJob = element.attributes.job.value; 
	     
	        if(elementJob == "delete"){
	            removesem(element);
	        }
	        
	        localStorage.setItem("sems", JSON.stringify(LIST2));
	    });

	    
	}
	</script>
</head>
<body>
	<div class="audit"><span>Academic Audit</span></div>
	<div class="branch"><span>CSE</span></div>
	<nav>
		<div class="burger">
			<div class="line1"></div>
			<div class="line2"></div>
			<div class="line3"></div>
		</div>
		<div class="bms">
			<span>BMSCE</span>
		</div>
		<div class="profile">
			<img src="img/studentuser.png">
		</div>
	</nav>
	<div class="logout">
		<span><?php echo $_SESSION['username']; ?></span>
		<a href="logout.php"><p>logout</p></a>
	</div>
	<div class="navlist">
		<div class="sem" ><span>Semister</span></div>
		<div class="note"><span>Note</span></div>
	</div>
	<div class="semex">
		<div class="even">
			<span>Even Sem</span>
		</div>
		<div class="odd">
			<span>Odd Sem</span>
		</div>
	</div>
	<div class="evenex">
		<ul class="elist l"><li><p class="text"><a href="result.html">Aug-dec(2019)</a></p><i class="fa fa-trash-o de" job="delete" ></i></li><li><p class="text">Aug-dec(2018)</p><i class="fa fa-trash-o de" job="delete" ></i></li><div class="einsert"><p>+</p><div></ul>
	</div>
	<div class="oddex">
		<ul class="olist l"><li><p class="text">Feb-jun(2019)</p><i class="fa fa-trash-o de" job="delete" ></i></li><div class="oinsert"><p>+</p></div></ul>
	</div>

		<div class="eadd">
				<select class="first">
					<option>-None-</option>
					<option>Jan</option>
					<option>Feb</option>
					<option>Mar</option>
					<option>Apr</option>
					<option>May</option>
					<option>Jun</option>
					<option>Jul</option>
					<option>Aug</option>
					<option>Sep</option>
					<option>Oct</option>
					<option>Nov</option>
					<option>Dec</option>
				</select>
				to
				<select class="second">
					<option>-None-</option>
					<option>Jan</option>
					<option>Feb</option>
					<option>Mar</option>
					<option>Apr</option>
					<option>May</option>
					<option>Jun</option>
					<option>Jul</option>
					<option>Aug</option>
					<option>Sep</option>
					<option>Oct</option>
					<option>Nov</option>
					<option>Dec</option>
				</select>

				<select class="year">
					<option>-None-</option>
					<option>2020</option>
					<option>2019</option>
					<option>2018</option>
					<option>2017</option>
					<option>2016</option>
					<option>2015</option>
				</select>
				<p class="efinal">+</p>				
		</div>
		<div class="oadd">
				<select class="first">
					<option>-None-</option>
					<option>Jan</option>
					<option>Feb</option>
					<option>Mar</option>
					<option>Apr</option>
					<option>May</option>
					<option>Jun</option>
					<option>Jul</option>
					<option>Aug</option>
					<option>Sep</option>
					<option>Oct</option>
					<option>Nov</option>
					<option>Dec</option>
				</select>
				to
				<select class="second">
					<option>-None-</option>
					<option>Jan</option>
					<option>Feb</option>
					<option>Mar</option>
					<option>Apr</option>
					<option>May</option>
					<option>Jun</option>
					<option>Jul</option>
					<option>Aug</option>
					<option>Sep</option>
					<option>Oct</option>
					<option>Nov</option>
					<option>Dec</option>
				</select>

				<select class="year">
					<option>-None-</option>
					<option>2020</option>
					<option>2019</option>
					<option>2018</option>
					<option>2017</option>
					<option>2016</option>
					<option>2015</option>
				</select>
				<p class="ofinal">+</p>				
		</div>

	 <div class="menu">
        
        <div class="header">
          <p>Events</p>
          <div class="clear">
            <i class="fa fa-refresh" aria-hidden="true"></i>
          </div>
          <div class="menu_remove">
            <i class="fa fa-times" aria-hidden="true"></i>
          </div>
        </div>

        <div class="contect">
          <div class="list_div"><ul id="list"></ul></div>
          <div class="add_item">
              <input type="text" id="input" placeholder="Add"/>
              <div class="add" job="add"><i class="fa fa-plus"  aria-hidden="true"></i></div>
          </div>
        </div>

      </div>

	<script type="text/javascript">
		block();
	</script>
</body>
</html>