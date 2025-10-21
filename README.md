This is a Assignment Project that is ready to deploy on any Cloud IaaS instance. Intended deployment is to be done on AWS EC2.
The Pupose of this activity is to learn to make Dockerfile and Docker Volume 

Assignment Guidelines:

Prepare your app so it runs on a configurable port and reads DB password from environment.

Create a Dockerfile to build the web image.

Build and push the image to Docker Hub.

Prepare Docker secret(s) for DB password.

Write a docker-compose.yml (Compose v3+ for use with docker stack deploy) that:

runs the web service using your image,

consumes Docker secret for DB root password.

Provision an AWS EC2 instance, install Docker, init Docker Swarm, deploy the stack with docker stack deploy.

Test the app, take screenshots, write final report and include files.



Docker Commands to get started: 
    
    docker compose up -d --build
    docker compose down -v 

    the project will run on 
    http://localhost:8080/
    or the 
    http://<public-ip>:8080/

    make sure to set the inbound rules  :) cheers.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

