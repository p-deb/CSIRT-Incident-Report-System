use proggadeb;

show tables;
select * from incident ORDER BY incidentNo DESC;
select * from `participant_has_incident`;
SELECT MAX(incidentNo) AS maxNo FROM incident;

#Login Credentials
INSERT INTO incidentResponders VALUES ('Deb', 'Progga', 1732, 'pdeb', 'pwd');
INSERT INTO incidentResponders VALUES('Garcia', 'Lynoska', 6541, 'lgarcia', 'pwd');
INSERT INTO incidentResponders VALUES('Liu', 'Xiaoxing', 9810, 'xliu', 'pwd'); 
INSERT INTO incidentResponders VALUES('User', 'Guest', 9999, 'dbms', 'fall2018'); 
SET @dbms := (SELECT username FROM incidentResponders WHERE username = 'dbms');
SET @pdeb := (SELECT username FROM incidentResponders WHERE username = 'pdeb');
SET @lgarcia := (SELECT username FROM incidentResponders WHERE username = 'lgarcia');
SELECT * FROM incidentResponders;

# Incident 1
INSERT INTO incident (incidentTitle, incidentType, incidentStatus, dateCreated) VALUES ('Phishing Report', 'Phishing', 'Closed', current_timestamp());
SELECT * FROM INCIDENT;
UPDATE incident SET incidentStatus = 'Open' WHERE incident.incidentNo = 11;
UPDATE incident SET incidentType = 'Intrusion' WHERE incident.incidentNo = 11;
UPDATE incident SET incidentType = 'Phishing' WHERE incidentNo = 10;
UPDATE incident SET incidentTitle = 'Moodle Intrusion' WHERE incidentNo = 11;
DELETE FROM incident WHERE incidentNo = 11;



#Participant 1
INSERT INTO participant VALUES ('Wilder', 'Kristy', 'Vendor', 'kwilder@dbms.edu', 'Suspect');
INSERT INTO participant VALUES ('Ryans', 'Paula', 'Full-Time Faculty', 'pryans@dbms.edu', 'Victim');
SET @lname := (SELECT lastName FROM participant);
SET @fname := (SELECT firstName FROM participant);
UPDATE participant SET reasonForIncident = 'Reporter' WHERE participant.lastName = 'Agelarkis';
UPDATE participant SET firstName = 'Lily' WHERE PARTICIPANT.lastName = 'Algelarkis';
UPDATE participant SET lastname = 'Ryans' WHERE firstName = 'Paula';
UPDATE participant SET email = 'lilyagelarkis@mail.dbms.edu' WHERE lastName = 'Agelarkis';
UPDATE participant SET jobTitle = 'Student' WHERE lastName = 'Agelarkis';
SELECT * FROM PARTICIPANT;

#Participant_has_Incident 1
INSERT INTO `participant_has_Incident` SELECT 'Wilder',  'Kristy', 1;
UPDATE participant_has_incident SET lastname = 'Agelarkis' WHERE firstName = 'opl' AND incidentNo = 11;
UPDATE participant_has_incident SET firstName = 'Lily' WHERE incidentNo = 11;
SELECT * FROM `participant_has_incident`;


#IP Address 1
INSERT INTO `ip address` SELECT '174.121.23.7', 'Host', MAX(incidentNo) FROM incident;
SELECT * FROM `IP ADDRESS`;
UPDATE `ip address` SET reasonForIncident = 'TBD' WHERE Incident_incidentNo = 11;
UPDATE `ip address` SET IPaddress = '342.6.79.10' WHERE Incident_incidentNo = 11;
DELETE FROM `participant` WHERE lastName = 'Ryans';

#Comments 1
INSERT INTO comments SELECT current_timestamp(), 'Called user. His mom picked up. User is away at college until December 19th. Mom refused to give user`s cell. Ticket status set to stalled for now.', @pdeb, MAX(incidentNo) FROM incident;
SELECT * FROM comments;
UPDATE comments SET description = 'User called because information was changed on her moodle page. Advised to change passwords. Info Sec team is investigating' WHERE dateUpdated = '2018-12-09 18:41:17';
DELETE FROM `comments` WHERE dateUpdated = '2018-12-09 18:42:54' and Incident_IncidentNo = 9;
