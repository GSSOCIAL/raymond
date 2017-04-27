//V3.0
QCRM.users_dropdown=false;
QCRM.share_search='All';
QCRM.native_cal=true;
QCRM.AOS_show_image=true;
QCRM.forceLock=false;
QCRM.AudioNotes=true;
QCRM.enableBeans(['Cases','Accounts','Contacts','ass_hardware','ass_lic','Calls','Meetings','Tasks','Project','ProjectTask','Notes','Documents']);
Beans['Cases'].AdditionalFields = ['case_number','type','state','status','priority','account_name','assigned_user_name','ass_hardware_cases_name','aop_case_updates_threaded','update_text','internal'];
Beans['Cases'].SearchFields = ['case_number','account_name','date_entered','status','assigned_user_name'];
Beans['Cases'].CustomListFields = ['case_number','account_name','ass_hardware_cases_name','date_entered','state','type','priority'];
Beans['Cases'].CustomLinks = {'ass_hardware_cases':{title:'LBL_ASS_HARDWARE_CASES_FROM_ASS_HARDWARE_TITLE'},'contacts':{title:'Contacts'},'notes':{title:'Notes'},'documents':{title:'Documents'}};
Beans['Accounts'].AdditionalFields = ['phone_office','phone_fax','website','email1','description','$ADDbilling','$ADDshipping'];
Beans['Accounts'].CustomListFields = ['billing_address_city','billing_address_state'];
Beans['Accounts'].CustomLinks = {'cases':{title:'Cases'},'ass_hardware_accounts':{title:'ass_hardware'},'ass_lic_accounts':{title:'ass_lic'},'contacts':{title:'Contacts'},'tasks':{title:'Tasks'},'notes':{title:'Notes'}};
Beans['Contacts'].AdditionalFields = ['title','account_name','email1','phone_work','phone_mobile','description','$ADDprimary','$ADDalt'];
Beans['Contacts'].SearchFields = ['email1'];
Beans['Contacts'].CustomListFields = ['account_name','title'];
Beans['Contacts'].TitleFields = ['first_name','last_name'];
Beans['Contacts'].CustomLinks = {'calls':{title:'Calls'},'meetings':{title:'Meetings'},'tasks':{title:'Tasks'},'notes':{title:'LBL_NOTES'}};
Beans['ass_hardware'].AdditionalFields = ['instal_name','ass_hardware_accounts_name','status','hd_type','rapid','cluster','os','dcmsys_ver','pass_r','pass_w','ip_eth0','vip','tech_cont'];
Beans['ass_hardware'].SearchFields = ['instal_name','ass_hardware_accounts_name','ip_eth0'];
Beans['ass_hardware'].CustomListFields = ['ass_hardware_accounts_name','hd_type','status','cluster','rapid','os'];
Beans['ass_hardware'].CustomLinks = {'ass_hardware_cases':{title:'LBL_ASS_HARDWARE_CASES_FROM_CASES_TITLE'},'ass_hardware_accounts':{title:'LBL_ASS_HARDWARE_ACCOUNTS_FROM_ACCOUNTS_TITLE'},'ass_hardware_contacts':{title:'LBL_ASS_HARDWARE_CONTACTS_FROM_CONTACTS_TITLE'},'ass_hardware_ass_lic':{title:'ass_lic'}};
Beans['ass_lic'].AdditionalFields = ['ass_lic_accounts_name','ass_hardware_ass_lic_name','end_date','lic_type','hard_id','ass_lic_contacts_name','lic_key'];
Beans['ass_lic'].SearchFields = ['ass_lic_accounts_name','ass_hardware_ass_lic_name','lic_type','end_date'];
Beans['ass_lic'].CustomListFields = ['ass_lic_accounts_name','ass_hardware_ass_lic_name','end_date','lic_type'];
Beans['ass_lic'].CustomLinks = {'ass_lic_accounts':{title:'LBL_ASS_LIC_ACCOUNTS_FROM_ACCOUNTS_TITLE'},'ass_hardware_ass_lic':{title:'LBL_ASS_HARDWARE_ASS_LIC_FROM_ASS_HARDWARE_TITLE'},'ass_lic_contacts':{title:'LBL_ASS_LIC_CONTACTS_FROM_CONTACTS_TITLE'}};
Beans['Calls'].AdditionalFields = ['direction','status','date_start','duration_hours','duration_minutes','description','parent_name'];
Beans['Calls'].SearchFields = ['status','date_start'];
Beans['Calls'].CustomListFields = ['status','parent_name','date_start'];
Beans['Calls'].CustomLinks = {'contacts':{title:'Contacts'},'users':{title:'Users'},'notes':{title:'Notes'}};
Beans['Meetings'].AdditionalFields = ['status','date_start','duration_hours','duration_minutes','description','parent_name'];
Beans['Meetings'].SearchFields = ['status','date_start'];
Beans['Meetings'].CustomListFields = ['status','parent_name','date_start'];
Beans['Meetings'].CustomLinks = {'contacts':{title:'Contacts'},'users':{title:'Users'},'notes':{title:'Notes'}};
Beans['Tasks'].AdditionalFields = ['status','date_start','date_due','priority','description','contact_name','parent_name'];
Beans['Tasks'].SearchFields = ['status','date_due','priority'];
Beans['Tasks'].CustomListFields = ['status','date_start','date_due','priority'];
Beans['Tasks'].CustomLinks = {'notes':{title:'Notes'}};
Beans['Project'].AdditionalFields = ['status','priority','description'];
Beans['Project'].CustomLinks = {'projecttask':{title:'ProjectTask'},'notes':{title:'Notes'}};
Beans['ProjectTask'].AdditionalFields = ['status','priority','project_name','description'];
Beans['ProjectTask'].SearchFields = ['status','priority'];
Beans['ProjectTask'].CustomListFields = ['status','priority','assigned_user_name'];
Beans['ProjectTask'].CustomLinks = {'notes':{title:'Notes'}};
Beans['Notes'].AdditionalFields = ['description','filename'];
Beans['Notes'].CustomListFields = ['filename'];
Beans['Notes'].CustomLinks = [];
Beans['Documents'].AdditionalFields = ['description','status_id','category_id'];
Beans['Documents'].SearchFields = ['status_id','category_id'];
Beans['Documents'].TitleFields = ['document_name'];
Beans['Documents'].CustomLinks = {'accounts':{title:'Accounts'},'contacts':{title:'Contacts'},'cases':{title:'Cases'}};
QCRM.Profiles={};QCRM.ProfileMode='SecurityGroups';
RowsPerPage=20;RowsPerDashlet=5;RowsPerSubPanel=5;
SimpleBeans['Users'].query += 'AND (users.is_group=0 OR users.is_group IS NULL)';
QCRM.addressFields=['street','city','state','postalcode','country'];
QCRM.google_addressFields=['street','city','state','postalcode','country'];
