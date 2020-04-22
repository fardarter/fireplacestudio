docker: 
	docker build -t fireplacestudio .

nginx: 
	docker build -t nginx-fps ./.nginx/.

.PHONY: docker nginx