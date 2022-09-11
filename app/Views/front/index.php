<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Scheduler: Responsive</title>
		<!-- Webix Library -->
		<script type="text/javascript" src="./codebase/webix/webix.js"></script>
		<link
			rel="stylesheet"
			type="text/css"
			href="./codebase/webix/webix.css"
		/>

		<!-- Scheduler -->
		<script type="text/javascript" src="./codebase/scheduler.js"></script>
		<link
			rel="stylesheet"
			type="text/css"
			href="./codebase/scheduler.css"
		/>
	</head>
	<body>
		<script>
			webix.ready(function() {
				webix.CustomScroll.init();

				webix.ui({
					cols: [
						{
							view: "scheduler",
							date: new Date(2020, 10,1),
							url: "http://localhost/",
						},
					],
				});
			});
		</script>
	</body>
</html>