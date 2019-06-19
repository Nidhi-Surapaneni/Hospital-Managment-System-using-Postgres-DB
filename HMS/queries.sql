the names of all administrators
select fname,address from system_administrator;//
the name and phone number of user
select fname,phone_no from user_table;
test name and description done in laboratory
select test_name,test_description from laboratory;
name qualification of receptionist
select fname,qualification from receptionist;
doctor name and appointment date and time for that doctor
select fname,a.appointment_date,a.appointment_time from doctor as d ,appointment_schedule as a where d.doctor_id in (select doctor_id from appointment_schedule where patient_id in (select user_id from user_table));
name of doctor who are specialized in urologist
select fanme from doctor where sepialization='UROLOGIST';
name of patients who are in icu
select fname from inpatient where w_id in(select w_id from ward where wtype='ICU');
medical store details
select * from medicalstore ;
name gender dob height weight and test report of patients who are users
select fname,lname,gender,date_of_birth,height,weight,test_report from Inpatient,user_table where patient_id=user_id;
details of doctor working in hospital
select fname,lname,gender,address,nationality,qualification,date_of_joining,sepialization,NIC_no,dtype from doctor;
details of receptionist
select  fname,lname,gender,address,nationality,qualification from receptionist ;
doctors who dont have any appointment
select fname from doctor where doctor_id not in(select doctor_id from appointment_schedule);
name and prescription given to  patients whose repots has high fever
select o.fname,e.prescription from examine as e,outpatient as o where e.patient_id=o.patient_id and o.test_report='HighFever';
female patients who had cardio arrest
select fname,medicine_name from Inpatient where test_report='cardio arrest' and gender='F';
patients who discharged on same day
select fname,medicine_name,test_report,height,weight from Inpatient where date_of_joining = date_of_discharge;
