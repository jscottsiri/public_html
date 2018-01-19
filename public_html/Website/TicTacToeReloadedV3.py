'''John Siri & Vasu Patel
Tic Tac Toe Reloaded- Mark VI

Spirollani
'''
#Imports turtle
import turtle
#Sets up drawboard
def drawboard(Tur):
    Tur.setheading(0)
    Tur.up()
    Tur.goto(-135,-45)
    Tur.down()
    Tur.fd(270)
    Tur.up()
    Tur.goto(-135,45)
    Tur.down()
    Tur.fd(270)
    Tur.up()
    Tur.lt(90)
    Tur.goto(-45,-135)
    Tur.down()
    Tur.fd(270)
    Tur.up()
    Tur.goto(45,-135)
    Tur.down()
    Tur.fd(270)
    Tur.ht()
    
def makenumbers(Tur):
    Tur.up()
    Tur.goto(-50,50)
    Tur.down()
    Tur.write(1,align='center',font=("Arial",8,"normal"))
    Tur.up()
    Tur.goto(-50,-40)
    Tur.down()
    Tur.write(4,align='center',font=("Arial",8,"normal"))
    Tur.up()
    Tur.goto(-50,-130)
    Tur.down()
    Tur.write(7,align='center',font=("Arial",8,"normal"))
    Tur.up()
    Tur.goto(0,50)
    Tur.down()
    Tur.write(2,align='center',font=("Arial",8,"normal"))
    Tur.up()
    Tur.goto(0,-40)
    Tur.down()
    Tur.write(5,align='center',font=("Arial",8,"normal"))
    Tur.up()
    Tur.goto(0,-130)
    Tur.down()
    Tur.write(8,align='center',font=("Arial",8,"normal"))
    Tur.up()
    Tur.goto(50,50)
    Tur.down()
    Tur.write(3,align='center',font=("Arial",8,"normal"))
    Tur.up()
    Tur.goto(50,-40)
    Tur.down()
    Tur.write(6,align='center',font=("Arial",8,"normal"))
    Tur.up()
    Tur.goto(50,-130)
    Tur.down()
    Tur.write(9,align='center',font=("Arial",8,"normal"))
    Tur.setheading(0)
    Tur.ht()

def gameover():
    print('Final Score Count: ')
    print(name1+' wins: '+str(wins1))
    print(name2+' wins: '+str(wins2))
    print('Thanks for playing!')
    
#sets up makeX
def makeX(x,y,turtle):
    turtle.setheading(90)
    turtle.up()
    turtle.goto(x,y)
    turtle.down()
    turtle.left(45)
    turtle.forward(40)
    turtle.left(180)
    turtle.forward(80)
    turtle.left(180)
    turtle.forward(40)
    turtle.left(90)
    turtle.forward(40)
    turtle.left(180)
    turtle.forward(80)
#sets up makeO
def makeO(x,y,turtle):
    turtle.setheading(0)
    turtle.up()
    turtle.goto(x,y)
    turtle.right(90)
    turtle.forward(30)
    turtle.left(90)
    turtle.down()
    turtle.circle(30)
    turtle.left(45)

#Selects background color
def colorpick(colorloop):
    while colorloop==True:
        print('Background color color- ')
        print('Options include white, red, blue, green, and yellow.')
        color=input('Select a background color: ')
        if color in colorlist:
            turtle.bgcolor(color.lower())
            print('Color selected.')
            colorloop=False
        else:
            print("Select an available color.")
#creates slots representing the 9 spaces in TicTacToe
slot1=0
slot2=0
slot3=0
slot4=0
slot5=0
slot6=0
slot7=0
slot8=0
slot9=0
usedlist=[]
colorlist=['white','red','blue','green','yellow']
win=False
player1=True
colorloop=True
keepplaying=True
wins1=0
wins2=0

print('Welcome to Tic Tac Toe.')
name1 = input('Insert name of player one: ')
name2 = input('Insert name of player two: ')
screen=turtle.Screen()
Bset=turtle.Turtle()
Bset.ht()
xTurt=turtle.Turtle()
xTurt.ht()
oTurt=turtle.Turtle()
oTurt.ht()



turtle.title("Tic Tac Toe")
colorpick(colorloop)


print("Player one will be X's and player two will be O's.")
print('There will be 9 boxes, each labelled one through 9')
print("Try to get three of your symbol in a row.")
drawboard(Bset)

makenumbers(Bset)
while keepplaying:
    while win==False:
        if player1:
            while player1:
                Num=input('Insert a slot number '+ name1+': ')
                intnum=int(Num)
                if intnum in usedlist:
                    print('This slot is full.')
                else:
                    if intnum == 1:
                        slot1=1
                        makeX(-90,90,xTurt)
                        player1=False
                        usedlist.append(intnum)
                    elif intnum == 2:
                        slot2=1
                        makeX(0,90,xTurt)
                        player1=False
                        usedlist.append(intnum)
                    elif intnum == 3:
                        slot3=1
                        makeX(90,90,xTurt)
                        player1=False
                        usedlist.append(intnum)
                    elif intnum == 4:
                        slot4=1
                        makeX(-90,0,xTurt)
                        player1=False
                        usedlist.append(intnum)
                    elif intnum == 5:
                        slot5=1
                        makeX(0,0,xTurt)
                        player1=False
                        usedlist.append(intnum)
                    elif intnum==6:
                        slot6=1
                        makeX(90,0,xTurt)
                        player1=False
                        usedlist.append(intnum)
                    elif intnum==7:
                        slot7=1
                        makeX(-90,-90,xTurt)
                        player1=False
                        usedlist.append(intnum)
                    elif intnum==8:
                        slot8=1
                        makeX(0,-90,xTurt)
                        player1=False
                        usedlist.append(intnum)
                    elif intnum==9:
                        slot9=1
                        makeX(90,-90,xTurt)
                        player1=False
                        usedlist.append(intnum)
        else:
            while player1==False:
                Num=input('Insert a slot number '+name2+': ')
                intnum=int(Num)
                if intnum in usedlist:
                    print('This slot is full.')
                else:
                    if intnum == 1:
                        slot1=2
                        makeO(-90,90,oTurt)
                        player1=True
                        usedlist.append(intnum)
                    elif intnum == 2:
                        slot2=2
                        makeO(0,90,oTurt)
                        player1=True
                        usedlist.append(intnum)
                    elif intnum == 3:
                        slot3=2
                        makeO(90,90,oTurt)
                        player1=True
                        usedlist.append(intnum)
                    elif intnum == 4:
                        slot4=2
                        makeO(-90,0,oTurt)
                        player1=True
                        usedlist.append(intnum)
                    elif intnum == 5:
                        slot5=2
                        makeO(0,0,oTurt)
                        player1=True
                        usedlist.append(intnum)
                    elif intnum==6:
                        slot6=2
                        makeO(90,0,oTurt)
                        player1=True
                        usedlist.append(intnum)
                    elif intnum==7:
                        slot7=2
                        makeO(-90,-90,oTurt)
                        player1=True
                        usedlist.append(intnum)
                    elif intnum==8:
                        slot8=2
                        makeO(0,-90,oTurt)
                        player1=True
                        usedlist.append(intnum)
                    elif intnum==9:
                        slot9=2
                        makeO(90,-90,oTurt)
                        player1=True
                        usedlist.append(intnum)
        if slot1==slot2 and slot2==slot3 and slot1>0:
            if slot1 ==1:
                print(name1+' wins')
                wins1+=1
                win=True
            else:
                print(name2+' wins')
                wins2+=1
                win=True
        elif slot4==slot5 and slot5==slot6 and slot4>0:
            if slot4 ==1:
                print(name1+' wins')
                wins1+=1
                win=True
            else:
                print(name2+' wins')
                wins2+=1
                win=True
        elif slot7==slot8 and slot8==slot9 and slot7>0:
            if slot7 ==1:
                print(name1+' wins')
                wins1+=1
                win=True
            else:
                print(name2+' wins')
                wins2+=1
                win=True
        elif slot1==slot4 and slot4==slot7 and slot1>0:
            if slot1 ==1:
                print(name1+' wins')
                wins1+=1
                win=True
            else:
                print(name2+' wins')
                wins2+=1
                win=True
        elif slot2==slot5 and slot5==slot8 and slot2>0:
            if slot2 ==1:
                print(name1+' wins')
                wins1+=1
                win=True
            else:
                print(name2+' wins')
                wins2+=1
                win=True
        elif slot3==slot6 and slot6==slot9 and slot3>0:
            if slot3 ==1:
                print(name1+' wins')
                wins1+=1
                win=True
            else:
                print(name2+' wins')
                wins2+=1
                win=True
        elif slot1==slot5 and slot5==slot9 and slot1>0:
            if slot1 ==1:
                print(name1+' wins')
                wins1+=1
                win=True
            else:
                print(name2+' wins')
                wins2+=1
                win=True
        elif slot3==slot5 and slot5==slot7 and slot3>0:
            if slot3 ==1:
                print(name1+' wins')
                wins1+=1
                win=True
            else:
                print(name2+' wins')
                wins2+=1
                win=True
        elif slot1>0 and slot2>0 and slot3>0 and slot3>0 and slot4>0 and slot5>0 and slot6>0 and slot7>0 and slot8>0 and slot9>0:
            print('Draw')
            win=True
    #Checking if user wants to play again
    playtest=input("Play Again? (Y/N): ")
    if (playtest.lower()=='y'):
        print('Scorecount: ')
        print(name1+' wins: '+str(wins1))
        print(name2+' wins: '+str(wins2))
        print('New Round')
        
        slot1=0
        slot2=0
        slot3=0
        slot4=0
        slot5=0
        slot6=0
        slot7=0
        slot8=0
        slot9=0
        win=False
        turtle.clearscreen()
        colorpick(colorloop)
        Bset=turtle.Turtle()
        drawboard(Bset)
        makenumbers(Bset)
        usedlist=[]

    else:
        gameover()
        keepplaying=False
