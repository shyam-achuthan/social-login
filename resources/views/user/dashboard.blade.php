<html><head>
        <title>Dashboard</title>

<link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>

<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<link href='/dashboard.css' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-6">

            <div class="card hovercard">
                <div class="cardheader">
                    <h1>{{$user['name']}}'s Dashboard</h1>
                </div>
                 
                <div class="info">

                    <div class="title">
                        Logged in as <a target="_blank" href="#">{{$user['name']}}</a>
                    </div>
                    <div class="desc">{{$user['email']}}</div>
                </div>
                <div class="bottom">
                    <a class="btn btn-primary btn-twitter btn-sm" href="/logout">
                        Logout
                    </a>

                </div>
            </div>

        </div>

	</div>
</div>
    </body></html>

