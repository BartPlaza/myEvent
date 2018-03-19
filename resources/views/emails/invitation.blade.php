<!doctype html>
<html>
    <head>
        
    </head>
    <body>
       <h1>Invitation for event:  {{$event->title}}</h1>

       <hr/>

       <h2>{{$event->owner->name}} invites you for his event!</h2>
		<h3>Event description:</h3>
        <p>{{$event->description}}</p>
		
		<hr/>

        <h3>To see all informations about this event go to:</h3>
        <a href="http://localhost/event/{{$event->id}}">Link to event</a>

        <hr/>

        Best regards,<br/>
        MyEvents Team
    </body>
</html>