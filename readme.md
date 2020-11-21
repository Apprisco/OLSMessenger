OLS based Messenger service for Exeter students:

1. Database backend:
Redis, hosted in dedicated server at 176.9.140.143
2. Spark Java based PHP/Java connection/jar file:
Java jar file, hosted in dedicated server at 148.251.247.206, spark port: 4567
To compile, need to download Lombok from https://projectlombok.org/setup/eclipse
then install it into eclipse by running the jar, then simply reboot eclipse.
Import project as maven, run maven install to build, datatabase-1.0-SNAPSHOT-jar-with-dependencies.jar in /target
is the final product.

if hosting jar on localhost, simply run jar, and change the $spark variable in variables.php to the correct link: "http://localhost:4567"

3. HTML/PHP/JS frontend
hosted anywhere, in this case: http://jodrew.host

To host, copy all .js, .css, .php, .PNG, files to htdocs or whatever XAMPP folder the apache is running in.
simply accessing localhost should work.

Group:
Steven Gao: Redis Database, Database API
Andrew Woo: Spark & PHP/jQuery work.
Alexey Alexandrovisky, Tony Xiao: DB/PHP team.
Anish Mudide: OLS Integration
Joseph Chen, Zander Chear, Eric Obukhanich: Front end Design

