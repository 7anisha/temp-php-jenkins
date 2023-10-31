pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build and Push Docker Images') {
            steps {
                script {
                    def dockerImageName = "anishaaaaa/myphp3:latest"

                    // Build the Apache Docker image
                    bat "docker build -t $dockerImageName -f Dockerfile ."

                    // Push the Docker image to a container registry (e.g., Docker Hub)
                    bat 'docker login -u anishaaaaa -p anisha12345'
                    bat "docker push $dockerImageName"
                }
            }
        }

        stage('Deploy to Kubernetes') {
            steps {
                script {
                    def mysqlPodName = 'mysql-pod'
                    def phpAdminPodName = 'phpadmin-pod'

                   // bat "kubectl create cm db-config --from-literal=MYSQL_DATABASE=sqldb"
                   // bat "kubectl create secret generic db-secret --from-literal=MYSQL_ROOT_PASSWORD=password"
                   //bat "kubectl apply -f mysql-pod.yaml"
                   // bat "kubectl expose pod mysql-pod --port=3306 --target-port=3306"


                  
                    bat "kubectl create cm phpadmin-config --from-literal=PMA_HOST=10.101.63.172"
                    bat "kubectl create secret generic phpadmin-secret --from-literal=PMA_USER=root --from-literal=PMA_PASSWORD=password"
                    bat "kubectl apply -f phpadmin.yaml"
                    bat "kubectl expose pod phpadmin-pod  --type=NodePort --port=8081 --target-port=80 --name=phpadmin-svc2" 

                    // Wait for the MySQL and PHPMyAdmin pods to be ready (you may need to adjust the timeouts)
                   // bat "kubectl wait --for=condition=ready pod/$mysqlPodName --timeout=300s"
                    //bat "kubectl wait --for=condition=ready pod/$phpAdminPodName --timeout=300s"

                    // bat "kubectl run php-app-pod --image=anishaaaaa/myphp2" 
                    // bat "kubectl expose pod php-app-pod  --type=NodePort --port=8088 --target-port=80 --name=php-app-svc2" 
                    
                }
            }
        }
    }

    post {
        failure {
            echo 'The pipeline has failed!'
        }
        success {
            echo 'The pipeline has succeeded!'
        }
    }
}
