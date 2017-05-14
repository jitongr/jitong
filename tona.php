
{
text  += "Now gent is :";
int i;//,rnd;
time_t ltime;
time(&ltime);
srand(ltime);  /*设置种子,并生成伪随机序列*/ 
char  b[11];  
sprintf(b,"%ld",ltime);
text +=b;
text +="\r\n";

for (i=4;i<85;i++)
{
//rnd=rand(); 
//sprintf(b,"%ld",rnd);
//text +=b;
//text +=": ";
//text +=" \r\n";
text += "When I was ";

 //Who lead me"
 if (i<5)
 text+=" little";
 else
 {sprintf(b,"%d",i);
 text +=b;}
text = text + " , under ";

switch (rand()%13)
{
case 1:
text = text + "Bodhisattva";
break;case 2:
text = text + "strong murders";
	break;case 3:
text = text + "my parents";
	break;case 4:
text = text + "my brothers";
break;case 5:
text = text + "my followers";
break;case 6:
text = text + "my children";
break;case 7:
text = text + "my preexistence";
break;case 8:
text = text + "evil";
break;case 9:
text = text + "angel";
break;case 10:
text = text + "god";
break;case 11:
text = text + "my guarder";
break;case 12:
text = text + "revenant";
break;case 0:
text = text + "the child's karma";
}

//Which Child?""
text = text + "'s arrange, I and a ";

switch (rand()%40)
{case 1:
text = text + "little boy";
break;case 2:
text = text + "little girl";
break;case 3:
text = text + "boy age 6";
break;case 4:
text = text + "girl age 6";
break;case 5:
text = text + "boy age 7";
break;case 6:
text = text + "girl age 7";
break;case 7:
text = text + "boy age 8";
break;case 8:
text = text + "girl age 8";
break;case 9:
text = text + "boy age 9";
break;case 10:
text = text + "girl age 9";
break;case 11:
text = text + "boy age 10";
break;case 12:
text = text + "girl age 10";
break;case 13:
text = text + "boy age 11";
break;case 14:
text = text + "girl age 11";
break;case 15:
text = text + "boy age 12";
break;case 16:
text = text + "girl age 12";
break;case 17:
text = text + "boy age 13";
break;case 18:
text = text + "girl age 13";
break;case 19:
text = text + "younth age 16";
break;case 20:
text = text + "girl age 16";
break;case 21:
text = text + "younth age 18";
break;case 22:
text = text + "girl age 18";
break;case 23:
text = text + "younth age 21";
break;case 24:
text = text + "girl age 21";
break;case 25:
text = text + "younth age 23";
break;case 26:
text = text + "girl age 23";
break;case 27:
text = text + "younth age 26";
break;case 28:
text = text + "lady age 26";
break;case 29:
text = text + "man age 34";
break;case 30:
text = text + "lady age 34";
break;case 31:
text = text + "man age 40";
break;case 32:
text = text + "lady age 40";
break;case 33:
text = text + "man age 50";
break;case 34:
text = text + "lady age 50";
break;case 35:
text = text + "n old man age 60";
break;case 36:
text = text + "n old lady age 60";
break;case 37:
text = text + "n old man age 70";
break;case 38:
text = text + "n old lady age 70";
break;case 39:
text = text + "dying man age 80";
break;case 0:
text = text + "dying lady age 80";

}




text = text + " was punished, we was ";
switch (rand()%5)
{case 1:
text = text + "nude ";
break;case 2:
text = text + "nack trunk ";
break;case 3:
text = text + "dress in poor ";
break;case 4:
text = text + "mark in label ";
break;case 0:
text = text + "nacked ";
}
switch (rand()%14)
{case 1:
text = text + "hands hang";
break;case 2:
text = text + "tie hands back";
break;case 3:
text = text + "spread limb";
break;case 4:
text = text + "lay on dirty";
break;case 5:
text = text + "tie limb firmly";
break;case 6:
text = text + "fasted spread to tree";
break;case 7:
text = text + "tie spread on ground";
break;case 8:
text = text + "genuflect";
break;case 9:
text = text + "foot hang";
break;case 10:
text = text + "bind body together";
break;case 11:
text = text + "hang hand 3day";
break;case 12:
text = text + "torture";
break;case 13:
text = text + "pillory 3day";
break;case 0:
text = text + "drowm";
}
text = text + " and ";
//what part pain
switch (rand()%15)
{case 1:
text = text + "beat body";
break;case 2:
text = text + "beat back";
break;case 3:
text = text + "destroy face";
break;case 4:
text = text + "destroy hand";
break;case 5:
text = text + "beat arse";
break;case 6:
text = text + "broil body";
break;case 7:
text = text + "torture";
break;case 8:
text = text + "destroy foot";
break;case 9:
text = text + "crucified on cross";
break;case 10:
text = text + "whip public";
break;case 11:
text = text + "lash to die";
break;case 12:
text = text + "lash";
break;case 13:
text = text + "hang public";
break;case 14:
text = text + "lash body two side";
break;case 0:
text = text + "bury alive";
}

text = text + " at ";

//Where suffer

switch (rand()%17)
{case 1:
text = text + "forest";
break;case 2:
text = text + "home";
break;case 3:
text = text + "execution ground";
break;case 4:
text = text + "street";
break;case 5:
text = text + "adytum";
break;case 6:
text = text + "bathroom";
break;case 7:
text = text + "stone hill";
break;case 8:
text = text + "school playground";
break;case 9:
text = text + "mortuary";
break;case 10:
text = text + "kindergarten";
break;case 11:
text = text + "riverain";
break;case 12:
text = text + "seashore";
break;case 13:
text = text + "island";
break;case 14:
text = text + "graveyard";
break;case 15:
text = text + "church yard";
break;case 16:
text = text + "temple yard";
break;case 0:
text = text + "fire place";
}

text = text + " surround by ";
//Who surround me"
switch (rand()%14)
{case 1:
text = text + "many children singers";
break;case 2:
text = text + "our loved child";
break;case 3:
text = text + "a angry revenger";
break;case 4:
text = text + "many little lives";
break;case 5:
text = text + "revelry laugher";
break;case 6:
text = text + "child he has baited";
break;case 7:
text = text + "strong murder";
break;case 8:
text = text + "angel";
break;case 9:
text = text + "our parents";
break;case 10:
text = text + "angels";
break;case 11:
text = text + "preexistence revenant";
break;case 12:
text = text + "Bodhisattva";
break;case 13:
text = text + "revenant";
break;case 0:
text = text + "suffer same";
}
text = text + " and I ";


//What part pain"
switch (rand()%10)
{case 1:
text = text + "die quickly";
break;case 2:
text = text + "was hurt";
break;case 3:
text = text + "was rescue";
break;case 4:
text = text + "was badly hurt";
break;case 5:
text = text + "become weaker";
break;case 6:
text = text + "suffer a long time to die";
break;case 7:
text = text + "suffer a long time but stand up";
break;case 8:
text = text + "stand up";
break;case 9:
text = text + "become stanch";
break;case 0:
text = text + "become godliness";
}

text = text + " and he ";
switch (rand()%10)
{case 1:
text = text + "die quickly";
break;case 2:
text = text + "was hurt";
break;case 3:
text = text + "was rescue";
break;case 4:
text = text + "was badly hurt";
break;case 5:
text = text + "become weaker";
break;case 6:
text = text + "suffer a long time to die";
break;case 7:
text = text + "suffer a long time but stand up";
break;case 8:
text = text + "stand up";
break;case 9:
text = text + "become stanch";
break;case 0:
text = text + "become godliness";
}

text = text + ".\r\n";


/////////////////////////////////////////////////////////////////////////////
/
void CTonalifeView::life()
{
int energy=9;
BOOL hlf=0;
text  += "Now gent is :";
int i,j;//,rnd;
time_t ltime;
time(&ltime);
srand(ltime);  /*设置种子,并生成伪随机序列*/ 
char  b[11];  
sprintf(b,"%ld",ltime);
text +=b;
text +="\r\n";
for(j=1;j<21;j++)
{
	text = text + "The ";
	sprintf(b,"%d",j);
	text +=b;
	text = text + " samsara:\r\n";
energy=10+j;

for (i=4;energy>0;i++)
{
//rnd=rand(); 
//sprintf(b,"%ld",rnd);
//text +=b;
//text +=": ";
//text +=" \r\n";
text += "Age ";

 //Who lead me"
 if (i<5)
 text+="little";
 else
 {sprintf(b,"%d",i);
 text +=b;}
text = text + " By ";

switch (rand()%13)
{
case 1:
text = text + "Bodhisattva";
energy+=3;
break;case 2:
text = text + "murder-2";
energy-=2;
	break;case 3:
text = text + "parent";
	break;case 4:
text = text + "brother";
break;case 5:
text = text + "follower";
break;case 6:
text = text + "children";
break;case 7:
text = text + "preexistence";
break;case 8:
text = text + "evil-3";
energy-=3;
break;case 9:
text = text + "angel+2";
energy+=2;
break;case 10:
text = text + "god-1";
energy-=1;
break;case 11:
text = text + "guard+1";
energy+=1;
break;case 12:
text = text + "revenant";
break;case 0:
text = text + "karma";
}

//Which Child?""
text = text + " With ";
int ttr=rand()%40;
int he;
switch (ttr)
{case 1:
text = text + "littleboy";
break;case 2:
text = text + "littlegirl";
break;case 3:
text = text + "boyage6";
break;case 4:
text = text + "girlage6";
break;case 5:
text = text + "boyage7";
break;case 6:
text = text + "girlage7";
break;case 7:
text = text + "boyage8";
break;case 8:
text = text + "girlage8";
break;case 9:
text = text + "boyage9";
break;case 10:
text = text + "girlage9";
break;case 11:
text = text + "boyage10";
break;case 12:
text = text + "girlage10";
break;case 13:
text = text + "boyage11";
break;case 14:
text = text + "girlage11";
break;case 15:
text = text + "boyage12";
break;case 16:
text = text + "girlage12";
break;case 17:
text = text + "boyage13";
break;case 18:
text = text + "girlage13";
break;case 19:
text = text + "younage16";he=16;
break;case 20:
text = text + "girlage16";he=16;
break;case 21:
text = text + "younage18";he=18;
break;case 22:
text = text + "girlage18";he=18;
break;case 23:
text = text + "younage21";he=21;
break;case 24:
text = text + "girlage21";he=21;
break;case 25:
text = text + "younage23";he=23;
break;case 26:
text = text + "girlage23";he=23;
break;case 27:
text = text + "younage26";he=26;
break;case 28:
text = text + "ladyage26";he=26;
break;case 29:
text = text + "manage34";he=34;
break;case 30:
text = text + "ladyage34";he=34;
break;case 31:
text = text + "manage40";he=40;
break;case 32:
text = text + "ladyage40";he=40;
break;case 33:
text = text + "manage50";he=50;
break;case 34:
text = text + "ladyage50";he=50;
break;case 35:
text = text + "omanage60";he=60;
break;case 36:
text = text + "oladyage60";he=60;
break;case 37:
text = text + "omanage70";
he=70;
break;case 38:
text = text + "oladyage70";
he=70;
break;case 39:
text = text + "dymanage80";
he=80;
break;case 0:
text = text + "dyladyage80";
he=80;
}
if(ttr<19)
he=ttr/2+4;
if(i<he)
energy+=1;
if(i<he+5)
energy+=1;
if(i<he+10)
energy+=2;
if(i>he+10)
energy-=2;
text = text + " We ";
switch (rand()%5)
{case 1:
text = text + "nude+1 ";
energy+=1;
break;case 2:
text = text + "nack trunk ";
break;case 3:
text = text + "dress poor ";
break;case 4:
text = text + "mark label ";
break;case 0:
text = text + "nacked";
}
switch (rand()%14)
{case 1:
text = text + "haghands ";
break;case 2:
text = text + "tiehandsback";
break;case 3:
text = text + "spread limb";
break;case 4:
text = text + "lay dirty+1";
energy+=1;
break;case 5:
text = text + "firmtie limb ";
break;case 6:
text = text + "faspread tree";
break;case 7:
text = text + "liespreadtie ";
break;case 8:
text = text + "genuflect+2";
energy+=2;
break;case 9:
text = text + "foot hang-1";
energy-=1;
break;case 10:
text = text + "bind together";
break;case 11:
text = text + "haghand 3day-2";
energy-=2;
break;case 12:
text = text + "torture";
break;case 13:
text = text + "pillory 3day-1";
energy-=1;
break;case 0:
text = text + "drowm";
}
text = text + " And ";
//what part pain
switch (rand()%15)
{case 1:
text = text + "beat body";
break;case 2:
text = text + "beat back";
break;case 3:
text = text + "destroy face-2";
energy-=2;
break;case 4:
text = text + "destroy hand-1";
energy-=1;
break;case 5:
text = text + "beat arse";
break;case 6:
text = text + "broil body-2";
energy-=2;
break;case 7:
text = text + "torture-1";
energy-=1;
break;case 8:
text = text + "destroy foot-1";
energy-=1;
break;case 9:
text = text + "crucified-3";
energy-=2;
break;case 10:
text = text + "whip public-2";
energy-=2;
break;case 11:
text = text + "lash to die-2";
energy-=2;
break;case 12:
text = text + "lash-1";
energy-=1;
break;case 13:
text = text + "hang public-2";
energy-=2;
break;case 14:
text = text + "lash bodyboth-1";
energy-=1;
break;case 0:
text = text + "bury alive-2";
energy-=2;
}

text = text + " At ";

//Where suffer

switch (rand()%17)
{case 1:
text = text + "forest";
break;case 2:
text = text + "home";
break;case 3:
text = text + "executiornd+2";
energy+=2;
break;case 4:
text = text + "street";
break;case 5:
text = text + "adytum";
break;case 6:
text = text + "bathroom";
break;case 7:
text = text + "stone hill";
break;case 8:
text = text + "playground-1";
energy-=1;
break;case 9:
text = text + "mortuary1";
energy+=1;
energy+=1;
break;case 10:
text = text + "kindergarten-2";
energy-=2;
break;case 11:
text = text + "riverain";
break;case 12:
text = text + "seashore";
break;case 13:
text = text + "island";
break;case 14:
text = text + "grave1";
energy+=1;
break;case 15:
text = text + "church1";
energy+=1;
break;case 16:
text = text + "temple2";
energy+=2;
break;case 0:
text = text + "firefer";
}

text = text + " Side ";
//Who surround me"
switch (rand()%14)
{case 1:
text = text + "children singers+1";
energy+=1;
break;case 2:
text = text + "loved child";
break;case 3:
text = text + "angry revenger";
break;case 4:
text = text + "little lives";
break;case 5:
text = text + "laugher-1";
energy-=1;
break;case 6:
text = text + "baitedchild";
break;case 7:
text = text + "murder-2";
energy-=2;
break;case 8:
text = text + "evil-3";
energy-=3;
break;case 9:
text = text + "parents";
break;case 10:
text = text + "angels+2";
energy+=2;
break;case 11:
text = text + "preexistence";
break;case 12:
text = text + "Bodhisattva";
energy+=3;
break;case 13:
text = text + "revenant";
break;case 0:
text = text + "sufferame";
}
text = text + " I ";


//What part pain"
switch (rand()%10)
{case 1:
text = text + "die...";
energy-=15;
break;case 2:
text = text + "hurt-1";
energy-=1;
break;case 3:
text = text + "rescued+1";
energy+=1;
break;case 4:
text = text + "badly hurt";
energy-=2;
break;case 5:
text = text + "weaker-'";
if(hlf)
energy-=1;
hlf=!hlf;
break;case 6:
text = text + "suffer to die";
energy-=5;
break;case 7:
text = text + "suffer bear";
energy+=1;
break;case 8:
text = text + "live+'";
if(hlf)
energy+=1;
hlf=!hlf;
break;case 9:
text = text + "stanch";
energy+=2;
break;case 0:
text = text + "godliness";
energy+=5;
}

text = text + " He ";
switch (rand()%10)
{case 1:
text = text + "die-2";
energy-=2;
break;case 2:
text = text + "hurt";
break;case 3:
text = text + "rescue";
break;case 4:
text = text + "badly hurt";
break;case 5:
text = text + "weaker";
break;case 6:
text = text + "suffer to die";
energy-=1;
break;case 7:
text = text + "suffer bear";
break;case 8:
text = text + "live";
break;case 9:
text = text + "stanch";
energy+=1;
break;case 0:
text = text + "godliness";
energy+=2;
}


text = text + ". E";
sprintf(b,"%d",energy);
text +=b;
	text = text + "\r\n";
}

}
}

void CTonalifeView::Ontona() 
{
int sam=26;
int sum=0;
int squsum=0,iat;
double avage,s;

	text  += "Now gent is :";
	time_t ltime;
	time(&ltime);
	srand(ltime);  /*设置种子,并生成伪随机序列*/ 
	
	sprintf(b,"%ld",ltime);
	text +=b;
	text +="\r\n";
	///////////////////
	for(j=1;j<=sam;j++)
	{
		text = text + "The ";
		sprintf(b,"%d",j);
		text +=b;
		text = text + " samsara:\r\n";
		
	energy=9+j/2;
    life();
    GetEditCtrl().SetWindowText(text.GetBuffer(text.GetLength()));   
    text.ReleaseBuffer(); 
	
	}
		text = text + "\r\nThe ages:";
	for(j=1;j<=sam;j++)
	{
		sprintf(b,"%d",agem[j]);
		text +=b;
		text = text + " ";
  sum+=agem[j];
  squsum+=agem[j]*agem[j];
		GetEditCtrl().SetWindowText(text.GetBuffer(text.GetLength()));   
		text.ReleaseBuffer(); 
	}
		text = text + "\r\n Sum ";
	sprintf(b,"%d",sum);
	text +=b;
		text = text + " Sumsqu ";
	sprintf(b,"%d",squsum);
	text +=b;
avage=(double)sum/(double)sam;
	text = text + " aveAge ";
	sprintf(b,"%.2f",avage);
	text +=b;
s=(double)squsum/(double)sam-avage*avage;
s=sqrt(s);
		text = text + " S ";
		sprintf(b,"%.2f",s);
	text +=b;
	text = text + " Now I at ";
	iat=rand()%sam+1;
	sprintf(b,"%d",iat);
	text +=b;
		text = text + " live ";
		sprintf(b,"%d",agem[iat]);
	text +=b;
	GetEditCtrl().SetWindowText(text.GetBuffer(text.GetLength()));   
		text.ReleaseBuffer(); 
}


void CTonalifeView::life()
{
//int t;
for (i=4;energy>0;i++)
{
	if(rand()%4==2) 
	{
		if (i<14)
			energy +=1;
		//----------------
		text += "Age ";
		if (i<5)
			text+="little";
		else
		{sprintf(b,"%d",i);
		text +=b;}
 ///---------------------
text = text + " By ";
orther();
text = text + " With ";
orwither();
text = text + " We ";
int m=ordeal();
text = text + " Side ";
orther();
text = text + " I ";
over(m,0);
text = text + " He ";
over(m,1);
//----------
text = text + ". E";
sprintf(b,"%d",energy);
text +=b;
text = text + "\r\n";
agem[j]=i;
	}

// else if(rand()%4==2){
// 	text += "Age ";
// 	if (i<5)
// 		text+="little";
// 	else
// 	{sprintf(b,"%d",i);
// 	text +=b;}
//  ///---------------------
// text = text + " I meat ";
// t=orwither();
// if((i>t)&(i-t<7)|(i<=t)&(t-i<7))
// text = text + ".We become goodfriend";
// if((i>23)&(t<13))
// text = text + ".I adopt he";
// text = text + ".\r\n";
/*}*/
}
}




int CTonalifeView::orwither()
{	
	int ttr=rand()%40;
	int he;
	switch (ttr)
	{case 1:
	text = text + "littleboy";
	break;case 2:
	text = text + "littlegirl";
	break;case 3:
	text = text + "boyage6";
	break;case 4:
	text = text + "girlage6";
	break;case 5:
	text = text + "boyage7";
	break;case 6:
	text = text + "girlage7";
	break;case 7:
	text = text + "boyage8";
	break;case 8:
	text = text + "girlage8";
	break;case 9:
	text = text + "boyage9";
	break;case 10:
	text = text + "girlage9";
	break;case 11:
	text = text + "boyage10";
	break;case 12:
	text = text + "girlage10";
	break;case 13:
	text = text + "boyage11";
	break;case 14:
	text = text + "girlage11";
	break;case 15:
	text = text + "boyage12";
	break;case 16:
	text = text + "girlage12";
	break;case 17:
	text = text + "boyage13";
	break;case 18:
	text = text + "girlage13";
	break;case 19:
	text = text + "younage16";he=16;
	break;case 20:
	text = text + "girlage16";he=16;
	break;case 21:
	text = text + "younage18";he=18;
	break;case 22:
	text = text + "girlage18";he=18;
	break;case 23:
	text = text + "younage21";he=21;
	break;case 24:
	text = text + "girlage21";he=21;
	break;case 25:
	text = text + "younage23";he=23;
	break;case 26:
	text = text + "girlage23";he=23;
	break;case 27:
	text = text + "younage26";he=26;
	break;case 28:
	text = text + "ladyage26";he=26;
	break;case 29:
	text = text + "manage34";he=34;
	break;case 30:
	text = text + "ladyage34";he=34;
	break;case 31:
	text = text + "manage40";he=40;
	break;case 32:
	text = text + "ladyage40";he=40;
	break;case 33:
	text = text + "manage50";he=50;
	break;case 34:
	text = text + "ladyage50";he=50;
	break;case 35:
	text = text + "omanage60";he=60;
	break;case 36:
	text = text + "oladyage60";he=60;
	break;case 37:
	text = text + "omanage70";
	he=70;
	break;case 38:
	text = text + "oladyage70";
	he=70;
	break;case 39:
	text = text + "dymanage80";
	he=80;
	break;case 0:
	text = text + "dyladyage80";
	he=80;
	}
	if(ttr<19)
		he=(ttr+1)/2+4;
	return(he);
}

int CTonalifeView::ordeal()
{
	char *place[]={"adytum","bathroom","house","forest","stonehill","executiornd","street",\
		"mortuary","grave","church","playground","kindergarten",\
          "riverain","seashore","island","temple"};
	char *dress[]={"mark dirty ","nude virgin","nack trunk ","dress poor ","mark label ",\
		"nacked"," "};
	char *suffer[]={"bind together","genuflectie","tiehandsback","bindtree","liespreadfst",\
		"firmtie limb","pillory","pillory 3day",\
		"tiehanback beat","faspread tree","haghands","foohang",\
		"haghand lash","foohang lash",\
		"faspread tree lash","lash haghand 3day","destroy face","destroy hand",\
		"broil body","destroy foot",\
		"crucified","fire","lash whip die",\
		"bind drowm","hang","bury animated",""};
text = text + dress[rand()%6];
//0-7 8-13 14-19 20-25
int t=rand()%26;
text = text + suffer[t];
text = text + " At ";
text = text + place[rand()%16];
if(0<=t&&t<=7)return(1);
if(8<=t&&t<=13)return(2);
if(14<=t&&t<=19)return(3);
else return(4);
}

int CTonalifeView::over(int suf,BOOL who)
{		int tr;
	char *diee[]={"die corpse","suffering die","die fortitude","die relive"};
	char *bbh[]={"suffer bear","badly hurt","hurt","weaker"};
		char *cbbh[]={"dump","live","foster","godliness"};
			char *dbbh[]={"purity","rescue","stanch","godliness"};
	switch(suf)
	{
	case 1:
        tr=rand()%4;
		text = text +diee[tr];
		energy=0;
		if (tr==3&&who) energy=1;
		break;
	case 2:	
		text = text +bbh[rand()%4];
		energy-=5;
		break;
	case 3:
		text = text +cbbh[rand()%4];
		break;
	case 4:	
		text = text +dbbh[rand()%4];
		break;
	}
return(3);
}

int CTonalifeView::orther()
{switch (rand()%17)
{
    case 1:
	text = text + "Bodhisattva";
	energy+=3;
	break;case 2:
	text = text + "angel";
	energy+=2;
	break;case 16:
	text = text + "prayer";
	energy+=1;
	break;case 15:
	text = text + "guarder";
	energy+=1;

	break;case 3:
	text = text + "parent";
	break;case 4:
	text = text + "brother";
	break;case 5:
	text = text + "follower";
	break;case 6:
	text = text + "children";
	break;case 7:
	text = text + "preexistence";
	break;case 8:
	text = text + "God";
	break;case 9:
	text = text + "revenant";
	break;case 10:
	text = text + "karma";
	break;case 11:
	text = text + "little lives";

	break;case 14:
	text = text + "rascal";
	energy-=1;
	break;case 13:
	text = text + "jurenile";
	energy-=1;
	break;case 12:
	text = text + "mob";
	energy-=2;
	break;case 0:
	text = text + "evil";
	energy-=3;
}
	return(4);
}

int CTonalifeView::learn()
{
	int dtie=0,dlsh=0,dspr=0;
	char *tie[]={"TH","THB","THBBT","BRN"};
	char *lsh[]={"HH","FH","HHL","FHL","HHL3","FHL3","HNG"};
	char *spr[]={"LS","FS","FSL","CRU"};
	for (i=4;energy>0;i++)
	{
		if(rand()%4==2) 
		{
			if (i<14)
				energy +=1;
			//----------------
			text += "Age ";
			if (i<5)
				text+="little";
			else
			{sprintf(b,"%d",i);
			text +=b;}
			///---------------------
			if(rand()%4==2) {	text = text + " With ";
			orwither();text = text + " We ";}
			else text = text + " I ";

switch (rand()%3)
{case 0:
text = text + tie[dtie];
dtie++;
if (dtie==4)energy=0;
break;
case 1:
	text = text + lsh[dlsh];
	dlsh++;
	if (dlsh==7)energy=0;
break;
case 2:
	text = text + spr[dspr];
	dspr++;
	if (dspr==4)energy=0;
break;
}
	//----------
		text = text + ". E";
		sprintf(b,"%d",energy);
		text +=b;
		text = text + "\r\n";
		agem[j]=i;
	}

	}return(4);
}
//--------------------------------------
void CTonalifeView::Onlifee() 
{int sam=26;
int sum=0;
int squsum=0,iat;
double avage,s;
	text  += "Now gent is :";
	time_t ltime;
	time(&ltime);
	srand(ltime);  /*设置种子,并生成伪随机序列*/ 
	
	sprintf(b,"%ld",ltime);
	text +=b;
	text +="\r\n";
	///////////////////
	for(j=1;j<=sam;j++)
	{
		text = text + "The ";
		sprintf(b,"%d",j);
		text +=b;
		text = text + " samsara:\r\n";
	energy=9+j/2;
		learn();
		GetEditCtrl().SetWindowText(text.GetBuffer(text.GetLength()));   
		text.ReleaseBuffer(); 
		
	}	
	text = text + "\r\nThe ages:";
	for(j=1;j<=sam;j++)
	{
		sprintf(b,"%d",agem[j]);
		text +=b;
		text = text + " ";
		sum+=agem[j];
		squsum+=agem[j]*agem[j];
		GetEditCtrl().SetWindowText(text.GetBuffer(text.GetLength()));   
		text.ReleaseBuffer(); 
	}
	text = text + "\r\n Sum ";
	sprintf(b,"%d",sum);
	text +=b;
	text = text + " Sumsqu ";
	sprintf(b,"%d",squsum);
	text +=b;
	avage=(double)sum/(double)sam;
	text = text + " aveAge ";
	sprintf(b,"%.2f",avage);
	text +=b;
	s=(double)squsum/(double)sam-avage*avage;
	s=sqrt(s);
	text = text + " S ";
	sprintf(b,"%.2f",s);
	text +=b;
	text = text + " Now I at ";
	iat=rand()%sam+1;
	sprintf(b,"%d",iat);
	text +=b;
	text = text + " live ";
	sprintf(b,"%d",agem[iat]);
	text +=b;
	GetEditCtrl().SetWindowText(text.GetBuffer(text.GetLength()));   
		text.ReleaseBuffer(); 
}
