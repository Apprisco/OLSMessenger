OLS based Messenger service for Exeter students:

1. Database backend:
Redis, hosted in dedicated server at 176.9.140.143
2. Spark Java based PHP/Java connection:
Java jar file, hosted in dedicated server at 176.9.140.143
To compile, need to download Lombok from https://projectlombok.org/setup/eclipse
then install it into eclipse by running the jar, then simply reboot eclipse.

Import project into Eclipse via Maven, then run maven clean install to generate target jar.

3. HTML/PHP/JS frontend
hosted anywhere, most likely now on jodrew.host
