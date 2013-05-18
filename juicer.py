#!/usr/bin/python
# Author: miknonny@gmail.com
# Date: 28.09.2012

import re, sys, os

# assigning variable names
exit_status = 'thanks for using email juicer Version 1.0\n'
no_mails = 'no emails found in file!'

######################################
#this section def functions to be
#ran on the main():
#####################################


def open_file(filename):
    #this opens a file for reading and pulls out a single instance for each word.
    try:
        single_instance = []
        f1 = open(filename, 'r')
        read_f1 = f1.read()	
        splitted_f1 = read_f1.split()
        for word in splitted_f1:
            if not word in single_instance:
                single_instance.append(word)
        
    except:
        print 'the file specified does not exist, please enter a valid file or path!\n'
        sys.exit()
    f1.close()
    single_instance2 = str(single_instance)
    return single_instance2
	
	
def all_mails(raw_mails):
    init_extract = open_file(raw_mails)
    # this reg_expresion matches all emails
    pattern = r'\w[\w_.]+@[\w.]+'
    all_matches = re.findall(pattern, init_extract) 
    if all_matches:
	for mails in all_matches:
            print mails
    else:
	print no_mails, '\n\n', exit_status  


def gmails(raw_mails):
    init_extract = open_file(raw_mails)
    #this regular expression matches gmails
    pattern = r'\w[\w_.]+@gmail[\w.]+'
    gmail_matches = re.findall(pattern, init_extract,)
    if gmail_matches:
	for mails in gmail_matches:
	    print mails
    else:
        print no_mails, '\n\n', exit_status 



def yahoomails(raw_mails):
    init_extract = open_file(raw_mails)
    #this reg_expression matches yahoomails
    pattern = r'\w[\w_.]+@yahoo[\w.]+'
    yahoo_matches = re.findall(pattern, init_extract)
    if yahoo_matches:
	for mails in yahoo_matches:
            print mails
    else:
	print no_mails, '\n\n', exit_status
	 
	 
def ip_addresses(raw_mails):
    init_extract = open_file(raw_mails)
    # this reg_expression matches ips
    pattern = r'[\d]+\.[\d]+\.[\d]+\.[\d]+'
    all_matches = re.findall(pattern, init_extract)
    if all_matches:
	for ip in all_matches:
	    print ip
    else:
        print 'no ips found!', '\n\n', exit_status

def url_locate(raw_mails):
    init_extract = open_file(raw_mails)
    #this regular expression matches domain
    pattern = r'[a-zA-z]+\.[\w]+\.[\w.]+'
    all_matches = re.findall(pattern, init_extract)
    print all_matches
    sys.exit()
    if all_matches:
        for ip in all_matches:
	    print ip
    else:
         print 'no urls found!', '\n\n', exit_status
	
		
	


############################
#this is the main prog which
#calls yahoomail, gmail,ip a-
#nd url repectively
############################

def main():
    if len(sys.argv) != 3:
	print 'usage: ./juicer.py {--all <-a>| --gmail <-g>| --yahoomail <-y>|  --ip<-i> | --url <-u> } file\n'
	sys.exit()
		
    option = sys.argv[1]
    file_name = sys.argv[2]
    if option == '--all' or option == '-a':
        all_mails(file_name)
    elif option == '--gmail' or option == '-g':
        gmails(file_name)
    elif option == '--yahoomail' or option == '-y':
        yahoomails(file_name)
    elif option == '--ip' or option == '-i':
       ip_addresses(file_name)
    elif option == '--url' or option == '-u':
       url_locate(file_name)
    else:
       print 'unknown option: ' + option
       sys.exit()
		
		
if __name__ == '__main__':
    main()
