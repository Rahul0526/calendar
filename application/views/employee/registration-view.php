<?php include_once 'header.php';?>
<section>
  <div class="container">
    <div class="center">
      <h2>User Registration</h2>
      <input type="hidden" id='site_url' value="<?=site_url()?>" />
    </div>
    <div class="stepwizard col-md-offset-5 col-md-70">
      <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step"> <a href="#step-1" type="button" class="btn btn-primary btn-circle disable-click">1</a>
          <p>Select Plan</p>
        </div>
        <div class="stepwizard-step"> <a href="#step-2" type="button" class="btn btn-default btn-circle disable-click" disabled="disabled">2</a>
          <p>Account Info</p>
        </div>
        <div class="stepwizard-step"> <a href="#step-3" type="button" class="btn btn-default btn-circle disable-click" disabled="disabled">3</a>
          <p>Term & Services Agreement</p>
        </div>
        <div class="stepwizard-step"> <a href="#step-4" type="button" class="btn btn-default btn-circle disable-click" disabled="disabled">4</a>
          <p>Payment Info</p>
        </div>
        <div class="stepwizard-step"> <a href="#step-5" type="button" class="btn btn-default btn-circle disable-click" disabled="disabled" onclick="return false;">5</a>
          <p>Complete</p>
        </div>
      </div>
    </div>
    <form role="form" action="<?=site_url('welcome/addUser')?>" method="post" autocomplete="false" id="user_reg" enctype="multipart/form-data">
      <div class="row setup-content" id="step-1">
        <div class="col-xs-70 col-md-offset-5">
          <div class=" panel panel-default">
            <div class="panel-heading">
             <!-- <h2 class="no-margin"> Select Plan</h2>-->
            </div>
            <div class="panel-body ">
              <div class="pricing-area text-center">
                <div class="col-sm-40 col-md-20 plan price-four wow fadeInDown">
                  <ul>
                    <li class="heading-four">
                    	
                      <h1 style="color:#fff"><?php echo $plan[0]->title?></h1>
                      <span> $
                      <?=$plan[0]->price_monthly?>
                      /Month</span> </li>
                    <li> $
                      <?=$plan[0]->price_yearly?>
                      /Year</li>
                    <li> <?php echo ($plan[0]->employees>0)?'('.$plan[0]->employees.' Employees)':''?></li>
                    <li><a class="btn btn-followUs" href="<?=site_url('/plan')?>">View Details</a></li>
                    <li class="plan-action">
                      <label class="btn btn-primary ">
                        <input type="radio" name="plan_id" id="option1" autocomplete="off" value="<?php echo $pid?>" <?php echo ($pid==$plan[0]->id)?'checked':''?>>
                        <?php echo $plan[0]->title?> </label>
                    </li>
                  </ul>
                </div>
              
              </div>
            </div>
            <div class="panel-footer clearfix">
              <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row setup-content" id="step-2">
        <div class="col-xs-70 col-md-offset-5">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="no-margin"> Account Info</h2>
            </div>
            <div class="panel-body">
              <div class="col-md-40">
                <div class="form-group">
                  <label class="control-label">First Name</label>
                  <input  maxlength="100" type="text" class="form-control" placeholder="Enter First Name" required="" name="f_name"  />
                </div>
                <div class="form-group">
                  <label class="control-label">Last Name</label>
                  <input maxlength="100" type="text" class="form-control" placeholder="Enter Last Name" name="l_name" />
                </div>
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <input maxlength="100" type="email" required="required" class="form-control" placeholder="Enter Email" name="email" />
                </div>
                <div class="form-group">
                  <label class="control-label">Phone No.</label>
                  <input maxlength="100" type="text" required="required" name="phone_no" class="form-control" placeholder="Enter Phone no." />
                </div>
                <div class="form-group">
                  <label class="control-label">Password</label>
                  <input maxlength="100" type="password" name="password" required="required" class="form-control" placeholder="Enter Password" />
                </div>
                <div class="form-group">
                  <label class="control-label">Re-Password</label>
                  <input maxlength="100" type="password" id="password-re" required="required" class="form-control" placeholder="Re-Enter Password" />
                </div>
                <div class="form-group">
                  <label class="control-label">Occupation</label>
                  <input maxlength="100" type="text" required="required" name="occupation" class="form-control" placeholder="Enter Occupation" />
                </div>
              </div>
              <div class="col-md-40">
                <div class="form-group">
                  <label class="control-label">Address Line1</label>
                  <input  maxlength="100" type="text" required="" name="address_1" class="form-control" placeholder="Enter Address Line 1"  />
                </div>
                <div class="form-group">
                  <label class="control-label">Address Line 2</label>
                  <input maxlength="100" type="text" name="address_2" class="form-control" placeholder="Enter Address Line 2" />
                </div>
                <div class="form-group">
                  <label class="control-label">City</label>
                  <input maxlength="100" type="text" required="required" name="city" class="form-control" placeholder="Enter City" />
                </div>
                <div class="form-group">
                  <label class="control-label">State</label>
                  <input maxlength="100" type="text" required="required" name="state" class="form-control" placeholder="Enter State" />
                </div>
                <div class="form-group">
                  <label class="control-label">Country</label>
                  <input maxlength="100" type="text" required="required" name="country" class="form-control" placeholder="Enter Country" />
                </div>
                <div class="form-group">
                  <label class="control-label">Zip</label>
                  <input maxlength="100" type="text" name="zip"  class="form-control" placeholder="Enter Zip" />
                </div>
                <div class="form-group">
                  <label class="control-label">Company Name</label>
                  <input maxlength="100" type="text" required="required" name="company" class="form-control" placeholder="Enter Company" />
                </div>
              </div>
            </div>
            <div class="panel-footer clearfix">
              <button class="btn btn-primary backBtn btn-lg pull-leftt" type="button" >Previous</button>
              <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row setup-content" id="step-3">
        <div class="col-xs-70 col-md-offset-5">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="no-margin"> Term & Conditions Agreement</h2>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label class="control-label">Term of Use</label>
                <textarea rows="10"  class="col-md-80 terms" readonly="">DM TECH SOLUTIONS, LLC. ("DM TECH") IS WILLING TO GRANT YOU (THE CUSTOMER) RIGHTS  TO  ESTABLISH  AN  ACCOUNT  AND  TO  USE  THE  SERVICES  ON  THIS STOCKSREALLY.COM SITE DESCRIBED ON THE ACCOMPANYING ORDER FORM ONLY UPON THE  CONDITION  THAT  YOU  ACCEPT  ALL  OF  THE  TERMS  CONTAINED  IN  THIS AGREEMENT.  PLEASE READ THE TERMS CAREFULLY.  BY CLICKING ON "I ACCEPT", YOU WILL INDICATE YOUR AGREEMENT WITH THEM.  IF YOU ARE ENTERING INTO THIS AGREEMENT  ON  BEHALF  OF  A  COMPANY  OR  OTHER  LEGAL  ENTITY  OR  PERSON,  YOUR ACCEPTANCE REPRESENTS THAT YOU HAVE THE AUTHORITY TO BIND SUCH ENTITY OR PERSON TO THESE TERMS.  IF YOU DO NOT AGREE WITH THESE TERMS, OR IF YOU DO NOT  HAVE  THE  AUTHORITY  TO  BIND  YOUR  ENTITY  OR  PERSON,  THEN  DM  TECH  IS UNWILLING  TO  GRANT  YOU  RIGHTS  TO  ESTABLISH  AN  ACCOUNT  AND  TO  USE  THE SERVICES PROVIDED BY THIS SITE. SOFTWARE AS A SERVICE AGREEMENT Effective Date:  September __, 2015 1.    Services.    Web  services  include  access  to  our  online  service accessible  through  our  stocksreally.com  website  (the “Platform”)  as described below and any updates or upgrades to our services which may be generally  released  by  us  to  all  customers  from  time  to  time  without additional  charge  ("Services").    We  reserve  the  right  to  modify  the Services from time to time; however, future modifications will not result in a diminution of the functionality or quality of the Services. Certain other  new  functionality  may  be  offered  in  the  future  for  an  additional fee, and if you elect to purchase any of this new functionality it will be deemed to be part of the Services.   1.1   You  will  login  to  the  Platform  and  establish  and  account.  During the term of this Agreement, you are authorized to use the Platform to  create  and  deploy  software  applications  that  will  be  integrated  into the  Platform,  as  follows:    (i)  mobile  applications,  and  (ii)  Web applications (collectively the “Apps”).  1.2   The Apps will enable communications and purchase transactions for your products and services, with all purchase and sale transactions to be  processed  via  the  Platform  either  through  PayPal  with  setup  at  no additional  charge  or  a  merchant  service  of  your  choice,  the  setup  for which to be charged on the basis of a mutually agreeable fee. 1.3   You are authorized to deploy the Apps only to your customers and employees. 1.4   You are solely responsible for your deployment, marketing, and promotion of all Apps that you create with the Platform.  2.    Provision of Online Services.  Subject to the terms and conditions hereof, we shall provide, and we hereby grant a non-exclusive license, to you (defined below) to access and use the Services during the term of this Agreement  only  to  the  extent  of  authorized  use  specified  in  your  order form  for  the  Services  ("Authorized  Use").    This  Agreement  provides  for your  use  of  the  Services  generated  by  our  software,  but  it  is  not otherwise an agreement for the sale or license of any software.  You may use the Services only for your internal business purposes of processing, storing and maintaining your data, and not for purposes of resale.  You 
are  solely  responsible  for  providing  your  Internet access  and  all  other technology  for  your  access  to  the  Services,  including  your  Internet connection. 3.    Restrictions on Use.  You agree that your use of the Services will be in a manner consistent with this Agreement and with all applicable laws and  regulations.    Without  limiting  the  generality  of  the  foregoing,  you will  not:    (a)  abuse  or  misuse  the  Services,  including  gaining  or attempting  to  gain  unauthorized  access  to  the  Services,  or  altering  or destroying information in the Services except in accordance with accepted practices;    (b)  allow  access  to  the  Services  other than  the  extent  of authorized  use  specified  in  the  applicable  order  form;  (c)    permit  any third  party  that  is  not  an  affiliated  entity  to  use  or  access  the Services;  (d)  process  or  permit  to  be  processed  the  data  of  any  third party  that  is  not  an  affiliated  entity;  or  (e)  to  attempt  to  copy, archive,  reverse-engineer,  decompile,  disassemble, create  a  derivative work from, or otherwise attempt to derive the source code of any part of our technology.  In addition, you are not authorized to use the Services or  servers  for  the  propagation,  distribution,  housing,  processing, storing, or otherwise handling in any way lewd, obscene, or pornographic material,  or  any  other  material  which  we  deem  to  be  objectionable.  The designation of any such materials is entirely at our sole discretion. 4.    Your  Account-Related  Responsibilities.    You  are  responsible  for maintaining  the  confidentiality  of  your  login  ID,  password,  and  any additional  information  that  we  may  provide  regarding  accessing  your account. If you  knowingly share your  login  ID and password with another person  who  is  not  authorized  to  use  the  Services,  this  Agreement  is subject to termination for cause.  You agree to immediately notify us of any unauthorized use of your login ID, password, or account or any other breach of security. 5.    Security.  You  will  be  solely  responsible  for  acquiring  and maintaining technology and procedures for maintaining the security of your link  to  the  Internet.    As  part  of  the  Services,  we will  implement reasonable  and  adequate  security  procedures  to  protect  your  data  in  our server(s) from unauthorized access using illicit means (the "Data Security Standard").    Provided  that  we  are  in  compliance  with  the  Data  Security Standard, the parties agree that we shall not, under any circumstances, be held responsible or liable for situations (i) where data or transmissions are accessed by  third parties through illegal or  illicit  means, or  (ii) where the data or transmissions are accessed through the exploitation of security gaps, weaknesses, or flaws unknown to us at the time.  We will promptly report to you any unauthorized access to your information on our site promptly upon discovery by us, and we will use diligent efforts to promptly  remedy  any  breach  of  security  that  permitted  such  unauthorized access.  In the event notification to persons included in such information is  required,  you  will  be  solely  responsible  for  any  and  all  such notifications at your expense. 6.    Confidential Information.   6.1   Each  party  ("Receiving  Party")  acknowledges  that  it  may receive  confidential  information  from  other  party  ("Disclosing  Party").  
</textarea>
              </div>
              <div class="form-group">
                <label class="control-label">Term of Services</label>
                <textarea rows="10" class="col-md-80 terms" readonly="">TERMS OF USE AND DMCA NOTICE Effective Date: June 1, 2015 To review material modifications and their effective dates scroll to the bottom of the page. 1.    Parties.  The parties to these Terms of Use are you, and the owner of this stocksreally.com website business, DM Tech Solutions, LLC. ("DM Tech").  All references to "we", "us", "our", this "website" or this "site" shall be construed to mean this website business and DM Tech.    2.    Use And Restrictions.  Subject to these Terms of Use and our Privacy Policy, you may use the public areas of this site, but only for your own internal purposes.  You agree not to access (or attempt to access) this site by any means other than through the interface we provide, unless you have been specifically allowed to do so in a separate agreement. You agree not to access (or attempt to access) this site through any automated means (including use of scripts or web crawlers), and you agree to comply with the instructions set out in any robots.txt file present on this site.  You are not authorized to (i) resell, sublicense, transfer, assign, or distribute the site, its services or content; (ii) modify or make derivative works based on the site, its services or content; or (iii) "frame" or "mirror" the site, its services or content on any other server or Internet-enabled device.  All rights not expressly granted in this Agreement are reserved by us and our licensors. 3.    Modification.  We reserve the right to modify these Terms of Use at any time, and without prior notice, by posting an amended Terms of Use that is always accessible through the Terms of Use link on this site's home page.  You should scroll to the bottom of this page periodically to review material modifications and their effective dates.  YOUR CONTINUED USE OF THIS SITE FOLLOWING OUR POSTING OF A MODIFICATION NOTICE OR NEW TERMS OF USE ON THIS SITE WILL CONSTITUTE BINDING ACCEPTANCE OF THE MODIFICATION OR NEW TERMS OF USE. 4.    How We Treat Postings To This Site (Blog, Forum, or Chat Room).   4.1We will not treat information that you post to areas of this site that are viewable by others (for example, to a blog, forum or chat-room) as proprietary, private, or confidential.  We have no obligation to monitor posts to this site or to exercise any editorial control over such posts; however, we reserve the right to review such posts and to remove any material that, in our judgment, is not appropriate.  Posting, transmitting, promoting, using, distributing or storing content that could subject us to any legal liability, whether in tort or otherwise, or that is in violation of any applicable law or regulation, or otherwise contrary to commonly accepted community standards, is prohibited, including without limitation information and material protected by copyright, trademark, trade secret, nondisclosure or confidentiality agreements, or other intellectual property rights, and material that violates export control laws.   
4.2   We, in our sole discretion and without notice, reserve the right, but undertake no duty, to review, edit, remove or delete any material submitted as a comment to blog, forum or chat-room provided for display or placed on this site.  Specifically, we reserve the right to delete or decline to post content that contains profanity; sexual content; overly graphic, disturbing or offensive material; vulgar or abusive language; hate speech, defamatory comments, or offensive language targeting any specific demographic; personal attacks of any kind; spam; promotions for commercial products or services. 4.3   By submitting a comment for posting, you agree that we are not responsible, and shall have no liability to you, with respect to any information or materials posted by others, including defamatory, offensive or illicit material, even material that violates this Agreement. 5.    Defamation; Communications Decency Act Notice.  This site is a provider of "interactive computer services" under the Communications Decency Act, 47 U.S.C. Section 230, and as such, our liability for defamation and other claims arising out of any postings to this site by third parties is limited as described therein.  We are not responsible for content or any other information posted to this site by third parties.  We neither warrant the accuracy of such postings or exercise any editorial control over such posts, nor do we assume any legal obligation for editorial control of content posted by third parties or liability in connection with such postings, including any responsibility or liability for investigating or verifying the accuracy of any content or any other information contained in such postings. 6.    Monitoring.  We reserve the right, but not the obligation, to monitor your access and use of this site without notification to you.  We may record or log your use in a manner as set out in our Privacy Policy that is accessible though the Privacy Policy link on this site's home page.  7.    Separate Agreements.  You may acquire products, services and/or content from this site. We reserve the right to require that you agree to separate agreements as a condition of your use and/or purchase of such products, services and/or content. 8.    Ownership.  The material provided on this site is protected by law, including, but not limited to, United States copyright law and international treaties. The copyrights and other intellectual property in the content of this site is owned by us and/or others. Except for the limited rights granted herein, all other rights are reserved.   9.    DMCA Notice.  This site is an Internet "service provider" under the Digital Millennium Copyright Act, 17 U.S.C. Section 512 ("DMCA").  As Required by the DMCA, this site maintains specific contact information provided below, including an e-mail address, for notifications of claimed infringement regarding materials posted to this site.  All notices should be addressed to the contact person specified below (our agent for notice of claimed infringement): 
            Notification of Claimed Infringement:             DM Tech Solutions, LLC.             1314 W. McDermott Ste. 106-605             Allen, TX, 75013             Agent's Name/Email Address:              compliance.officer@stocksreally.com             Telephone: 214-883-4222 You may contact our agent for notice of claimed infringement specified above with complaints regarding allegedly infringing posted material and we will investigate those complaints.  If the posted material is believed in good faith by us to violate any applicable law, we will remove or disable access to any such material, and we will notify the posting party that the material has been blocked or removed.  In notifying us of alleged copyright infringement, the DMCA requires that you include the following information: (i) description of the copyrighted work that is the subject of claimed infringement; (ii) description of the infringing material and information sufficient to permit us to locate the alleged material; (iii) contact information for you, including your address, telephone number and/or e-mail address; (iv) a statement by you that you have a good faith belief that the material in the manner complained of is not authorized by the copyright owner, or its agent, or by the operation of any law; (v) a statement by you, signed under penalty of perjury, that the information in the notification is accurate and that you have the authority to enforce the copyrights that are claimed to be infringed; and (vi) a physical or electronic signature of the copyright owner or a person authorized to act on the copyright owner's behalf.  Failure to include all of the above-listed information may result in the delay of the processing of your complaint. 10.   Warranty Disclaimers.  EXCEPT AS MAY BE PROVIDED IN ANY SEPARATE WRITTEN AGREEMENTS SIGNED BY THE PARTIES, THE SERVICES, CONTENT, AND/OR PRODUCTS ON THIS SITE ARE PROVIDED "AS-IS", AND NEITHER WE NOR ANY OF OUR LICENSORS MAKE ANY REPRESENTATION OR WARRANTY WITH RESPECT TO SUCH PRODUCTS, SERVICES, AND/OR CONTENT.  EXCEPT AS MAY BE PROVIDED IN ANY SEPARATE WRITTEN AGREEMENT SIGNED BY THE PARTIES OR SEPARATE AGREEMENT ORIGINATING FROM THIS SITE, THIS SITE AND ITS LICENSORS SPECIFICALLY DISCLAIM, TO THE FULLEST EXTENT PERMITTED BY LAW, ANY AND ALL WARRANTIES, EXPRESS OR IMPLIED, RELATING TO THIS SITE OR PRODUCTS, SERVICES AND/OR CONTENT ACQUIRED FROM THIS SITE, INCLUDING BUT NOT LIMITED TO, IMPLIED WARRANTIES OF MERCHANTABILITY, COMPLETENESS, TIMELINESS, CORRECTNESS, NON-INFRINGEMENT, OR FITNESS FOR ANY PARTICULAR PURPOSE.  THIS SITE AND ITS LICENSORS DO NOT REPRESENT OR WARRANT THAT THIS SITE, ITS PRODUCTS, SERVICES, AND/OR CONTENT: (A) WILL BE SECURE, TIMELY, UNINTERRUPTED OR ERROR-FREE OR OPERATE IN COMBINATION WITH ANY OTHER HARDWARE, SOFTWARE, SYSTEM OR DATA, (B) WILL MEET YOUR REQUIREMENTS OR EXPECTATIONS, OR (C) WILL BE FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS. THESE DISCLAIMERS CONSTITUTE AN ESSENTIAL PART OF THIS AGREEMENT.  NO PURCHASE OR USE OF THE ITEMS OFFERED BY THIS SITE IS AUTHORIZED HEREUNDER EXCEPT UNDER THESE DISCLAIMERS.  IF IMPLIED WARRANTIES MAY NOT BE DISCLAIMED UNDER APPLICABLE LAW, THEN ANY IMPLIED WARRANTIES ARE LIMITED IN DURATION TO THE PERIOD REQUIRED BY APPLICABLE LAW.  SOME STATES OR JURISDICTIONS DO 
NOT ALLOW LIMITATIONS ON HOW LONG AN IMPLIED WARRANTY MAY LAST, SO THE ABOVE LIMITATIONS MAY NOT APPLY TO YOU. Stocksreally.com, its founders, officers, and employees are NOT investment or money managers or make any claim to have any non-public or special knowledge about stocks or investing other than what we have developed in-house using our own methods and concepts.  Stocksreally.com is for reference and information purposes only.  It is not intended to be investment advice.  Seek a duly licensed professional for investment advice before you make an investment in stocks or any other risky investment. 11.   Limitation of Liability.   IN NO EVENT SHALL THIS SITE AND/OR ITS LICENSORS BE LIABLE TO ANYONE FOR ANY DIRECT, INDIRECT, PUNITIVE, SPECIAL, EXEMPLARY, INCIDENTAL, CONSEQUENTIAL OR OTHER DAMAGES OF ANY TYPE OR KIND (INCLUDING LOSS OF DATA, REVENUE, PROFITS, USE OR OTHER ECONOMIC ADVANTAGE) ARISING OUT OF, OR IN ANY WAY CONNECTED WITH THIS SITE, ITS PRODUCTS, SERVICES, AND/OR CONTENT, ANY INTERRUPTION, INACCURACY, ERROR OR OMISSION, REGARDLESS OF CAUSE, EVEN IF THIS SITE OR OUR LICENSORS HAVE BEEN PREVIOUSLY ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. 12.   Links to This Site.  We grant to you a limited, revocable, and nonexclusive right to create a hyperlink to this site provided that the link does not portray us or our products or services in a false, misleading, derogatory, or offensive matter. You may not use any logo, trademark, or tradename that may be displayed on this site or other proprietary graphic image in the link without our prior written consent. 13.   Links to Third Party Websites.  We do not review or control third party websites that link to or from this site, and we are not responsible for their content, and do not represent that their content is accurate or appropriate. Your use of any third party site is on your own initiative and at your own risk, and may be subject to the other sites' terms of use and privacy policy. 14.   Participation In Promotions of Advertisers.  You may enter into correspondence with or participate in promotions of advertisers promoting their products, services or content on this site.  Any such correspondence or participation, including the delivery of and the payment for products, services or content, are solely between you and each such advertiser. 15.   Consumer Rights Information; California Civil Code Section 1789.3.  If this site charges for services, products, content, or information, pricing information will be posted as part of the ordering process for this site.  We maintain specific contact information including an e-mail address for notifications of complaints and for inquiries regarding pricing policies in accordance with California Civil Code Section 1789.3.  All correspondence should be addressed to our agent for notice at the following address:             Notification of Consumer Rights Complaint or Pricing Inquiry:             DM Tech Solutions, LLC. 
            1314 W. McDermott Ste. 106-605             Allen, TX, 75013             Contact: compliance.officer@dmtechsolutions.com             Telephone: 214-883-4222 You may contact us with complaints and inquiries regarding pricing and we will investigate those matters and respond to the inquiries. The Complaint Assistance Unit of the Division of Consumer Services of the Department of Consumer Affairs may be contacted in writing at 1020 N. Street, #501, Sacramento, CA 95814, or by telephone at 1-916-445-1254. 16.   Arbitration.  Except for actions to protect intellectual property rights and to enforce an arbitrator's decision hereunder, all disputes, controversies, or claims arising out of or relating to this Agreement or a breach thereof shall be submitted to and finally resolved by arbitration under the rules of the American Arbitration Association ("AAA") then in effect.  There shall be one arbitrator, and such arbitrator shall be chosen by mutual agreement of the parties in accordance with AAA rules.  The arbitration shall take place in Dallas, Texas, USA, and may be conducted by telephone or online.  The arbitrator shall apply the laws of the State of Georgia, USA to all issues in dispute.  The controversy or claim shall be arbitrated on an individual basis, and shall not be consolidated in any arbitration with any claim or controversy of any other party.  The findings of the arbitrator shall be final and binding on the parties, and may be entered in any court of competent jurisdiction for enforcement. Enforcements of any award or judgment shall be governed by the United Nations Convention on the Recognition and Enforcement of Foreign Arbitral Awards.  Should either party file an action contrary to this provision, the other party may recover attorney's fees and costs up to $1000.00. 17.   Jurisdiction And Venue.  The courts of Collin County in the State of Georgia, USA and the nearest U.S. District Court in the State of Georgia shall be the exclusive jurisdiction and venue for all legal proceedings that are not arbitrated under these Terms of Use. 18.   Controlling Law.  This Agreement shall be construed under the laws of the State of Georgia, USA, excluding rules regarding conflicts of law.  The application the United Nations Convention of Contracts for the International Sale of Goods is expressly excluded. 19.   Onward Transfer of Personal Information Outside Your Country of Residence.  Any personal information which we may collect on this site may be stored and processed in our servers located in the United States or in any other country in which we, or our affiliates, subsidiaries, or agents maintain facilities.  You consent to any such transfer of personal information outside your country of residence to any such location. 20.   Severability.   If any provision of these terms is declared invalid or unenforceable, such provision shall be deemed modified to the extent necessary and possible to render it valid and enforceable.  In any event, the unenforceability or invalidity of any provision shall not affect any other provision of these terms, and these terms shall continue in full 
force and effect, and be construed and enforced, as if such provision had not been included, or had been modified as above provided, as the case may be. 21.   Force Majeure.  We shall not be liable for damages for any delay or failure of delivery arising out of causes beyond our reasonable control and without our fault or negligence, including, but not limited to, Acts of God, acts of civil or military authority, fires, riots, wars, embargoes, Internet disruptions, hacker attacks, or communications failures. 22.   Privacy.  Please review this site's Privacy Policy which also governs your visit to this site.  Our Privacy Policy is always accessible on our site's home page. Material Modifications Since June 1, 2015:  none. </textarea>
              </div>
              <div class="form-group">
                <input type="checkbox" value="accepted" required="" />
                <label class="control-label">I agree the above terms.</label>
              </div>
            </div>
            <div class="panel-footer clearfix">
              <button class="btn btn-primary backBtn btn-lg pull-leftt" type="button" >Previous</button>
              <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row setup-content" id="step-4">
        <div class="col-xs-70 col-md-offset-5">
          <div class=" panel panel-default">
            <div class="panel-heading">
              <h3 class="no-margin"> Payment</h3>
            </div>
            <div class="panel-body">
              <div class="col-md-40">
                <div class="form-group">
                  <label class="control-label">Monthly Subscription</label>
                  <input type="radio" name="subscriptionType" value="monthly" checked="" />
                </div>
              </div>
              <div class="col-md-40">
                <div class="form-group">
                  <label class="control-label">Yearly Subscription</label>
                  <input type="radio" name="subscriptionType" value="yearly" />
                </div>
              </div>
            </div>
            <div class="panel-footer clearfix">
              <button class="btn btn-primary backBtn btn-lg pull-leftt" type="button" >Previous</button>
              <button class="btn btn-success btn-lg pull-right nextBtn" type="submit">Submit</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row setup-content" id="step-5">
        <div class="col-xs-70 col-md-offset-5">
          <div class=" panel panel-default">
            <div class="panel-body text-center">
              <div class="success-panel"> <i class="fa fa-comments"></i> </div>
              <h2 class="no-margin">Payment Processing</h2>
              <p class="lead">Please wait! Don't close or reload this page.</p>
              <!--                <div class="request">
                    <h4><a href="<?=site_url('login')?>">Login</a></h4>
                </div>--> 
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<?php include_once 'footer.php';?>