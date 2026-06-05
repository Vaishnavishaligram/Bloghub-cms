<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'title'             => 'SSC CGL 2024 Admit Card Released — Download Now',
                'short_description' => 'The Staff Selection Commission has released the admit card for SSC CGL Tier-I 2024. Candidates can download it from the official website before the exam date.',
                'content'           => '<h2>SSC CGL 2024 Admit Card</h2><p>The Staff Selection Commission (SSC) has officially released the admit card for the Combined Graduate Level (CGL) Tier-I Examination 2024. This is one of the most sought-after exams for graduates aiming for central government positions.</p><h3>How to Download</h3><ol><li>Visit the official SSC portal at <strong>ssc.nic.in</strong></li><li>Click on the "Admit Card" section in the menu</li><li>Select "SSC CGL 2024 Tier-I Admit Card"</li><li>Enter your Registration Number and Date of Birth</li><li>Download and print at least two copies</li></ol><h3>Documents to Carry</h3><ul><li>Printed admit card (clear, no smudges)</li><li>One valid government-issued photo ID (Aadhar, PAN, Passport)</li><li>One recent passport-size photograph</li></ul><p><strong>Important:</strong> No candidate will be permitted entry into the examination hall without a valid admit card. Verify all printed details carefully before exam day.</p>',
                'category'          => 'Admit Card',
                'published_at'      => Carbon::now()->subDays(2),
            ],
            [
                'title'             => 'UPSC Civil Services Final Result 2024 Declared',
                'short_description' => 'Union Public Service Commission has announced the final results for Civil Services Examination 2024. Check the official merit list for your roll number.',
                'content'           => '<h2>UPSC CSE 2024 Final Result</h2><p>The Union Public Service Commission (UPSC) has declared the final result of the Civil Services Examination (CSE) 2024. A total of 1,016 candidates have been recommended for appointment to various Group A and Group B Central Services including IAS, IPS, and IFS.</p><h3>How to Check Your Result</h3><ol><li>Go to <strong>upsc.gov.in</strong></li><li>Click on "Final Results" under the Examinations tab</li><li>Select Civil Services Examination 2024</li><li>Download the PDF merit list</li><li>Use Ctrl+F to search your roll number</li></ol><h3>Next Steps for Selected Candidates</h3><p>Selected candidates will receive official communication for document verification and medical examination. Keep all original academic certificates, identity proofs, and category certificates ready.</p>',
                'category'          => 'Result',
                'published_at'      => Carbon::now()->subDays(5),
            ],
            [
                'title'             => 'IBPS PO 2024 Complete Syllabus & Exam Pattern',
                'short_description' => 'Detailed syllabus and updated exam pattern for IBPS PO Preliminary and Mains 2024. Includes subject-wise topic breakdown and marking scheme.',
                'content'           => '<h2>IBPS PO 2024 Syllabus</h2><p>The Institute of Banking Personnel Selection (IBPS) has released the official syllabus for the Probationary Officer (PO) Examination 2024. Here is a comprehensive topic-wise breakdown for both stages.</p><h3>Preliminary Examination (100 marks, 1 hour)</h3><ul><li><strong>English Language (30 marks):</strong> Reading Comprehension, Cloze Test, Para Jumbles, Error Detection</li><li><strong>Quantitative Aptitude (35 marks):</strong> Number Series, Data Interpretation, Simplification, Quadratic Equations</li><li><strong>Reasoning Ability (35 marks):</strong> Puzzles, Seating Arrangement, Syllogism, Coding-Decoding</li></ul><h3>Mains Examination (200 marks, 3 hours)</h3><ul><li>Reasoning &amp; Computer Aptitude — 60 marks</li><li>English Language — 40 marks</li><li>Data Analysis &amp; Interpretation — 60 marks</li><li>General/Economy/Banking Awareness — 40 marks</li></ul><p>The final merit list is prepared based on Mains + Interview (100 marks) combined score. Prelims is only qualifying in nature.</p>',
                'category'          => 'Syllabus',
                'published_at'      => Carbon::now()->subDays(8),
            ],
            [
                'title'             => 'RRB NTPC Answer Key 2024 — Raise Objections Before Deadline',
                'short_description' => 'Railway Recruitment Board has released the provisional answer key for NTPC CBT 1 2024. Candidates can challenge incorrect answers by paying Rs. 50 per objection.',
                'content'           => '<h2>RRB NTPC Answer Key 2024</h2><p>The Railway Recruitment Board (RRB) has released the provisional answer key for Non-Technical Popular Categories (NTPC) Computer Based Test Stage 1, 2024. Candidates can download their response sheet and compare with the official key.</p><h3>Important Dates</h3><ul><li><strong>Answer Key Released:</strong> June 10, 2024</li><li><strong>Objection Window Opens:</strong> June 11, 2024</li><li><strong>Last Date to Raise Objection:</strong> June 20, 2024</li><li><strong>Fee per Objection:</strong> ₹50 (refunded if objection is accepted)</li></ul><h3>How to Download Answer Key</h3><ol><li>Visit your zone RRB website (e.g., rrbcdg.gov.in)</li><li>Click on "Answer Key" link for NTPC 2024</li><li>Log in with registration number and password</li><li>Download answer key PDF and response sheet</li></ol><p>Objections submitted without fee payment will not be considered. The final answer key will be published after review of all valid objections.</p>',
                'category'          => 'Answer Key',
                'published_at'      => Carbon::now()->subDays(1),
            ],
            [
                'title'             => 'SBI Clerk Recruitment 2024 — 13,735 Vacancies Open',
                'short_description' => 'State Bank of India has announced massive recruitment for Junior Associates. 13,735 vacancies across all states. Online applications close July 7, 2024.',
                'content'           => '<h2>SBI Clerk Recruitment 2024</h2><p>State Bank of India (SBI) has released an official notification for the recruitment of Junior Associates (Customer Support &amp; Sales) in the Clerical Cadre across all states of India.</p><h3>Vacancy Details</h3><p>Total Posts: <strong>13,735</strong> across all circles. Category-wise breakdown is available in the official notification on sbi.co.in/careers.</p><h3>Eligibility Criteria</h3><ul><li><strong>Age:</strong> 20–28 years (SC/ST/OBC relaxation as per government norms)</li><li><strong>Education:</strong> Graduation in any discipline from a recognised university</li><li><strong>Language:</strong> Proficiency in official language of the state being applied for is mandatory</li></ul><h3>Application &amp; Exam Dates</h3><ul><li>Online Application Start: June 17, 2024</li><li>Last Date to Apply: July 7, 2024</li><li>Preliminary Exam: August–September 2024 (tentative)</li></ul><p>Apply exclusively at <strong>sbi.co.in/careers</strong>. No offline applications or applications via any other portal will be entertained.</p>',
                'category'          => 'Recruitment',
                'published_at'      => Carbon::now()->subDays(3),
            ],
            [
                'title'             => 'NEET UG 2024 Exam Date Revised — Official Update',
                'short_description' => 'National Testing Agency has revised the NEET UG 2024 examination schedule following Supreme Court orders. All registered candidates must check the updated date immediately.',
                'content'           => '<h2>NEET UG 2024 Revised Exam Schedule</h2><p>The National Testing Agency (NTA) has officially revised the NEET Undergraduate (UG) 2024 examination schedule as directed by the Supreme Court of India. All registered candidates must take note of the updated information.</p><h3>Key Updates</h3><ul><li>New exam date announced on nta.ac.in (check official site)</li><li>Fresh admit cards to be re-issued with updated centre details</li><li>Exam centres may have changed — verify before exam day</li><li>Mode remains Pen &amp; Paper (OMR-based)</li></ul><h3>What Candidates Must Do</h3><ol><li>Download the new admit card from neet.nta.nic.in once released</li><li>Verify exam city, centre address, and reporting time</li><li>Carry original photo ID along with the admit card</li><li>Follow NTA dress code and exam hall guidelines strictly</li></ol><p>Candidates should regularly monitor <strong>nta.ac.in</strong> and <strong>neet.nta.nic.in</strong> for the latest notifications. Do not rely on unofficial sources.</p>',
                'category'          => 'Exam Date',
                'published_at'      => Carbon::now()->subDays(4),
            ],
            [
                'title'             => 'CSIR NET June 2024 Admit Card — Hall Ticket Active',
                'short_description' => 'NTA has activated the CSIR NET June 2024 admit card download. Candidates applying for JRF and Lectureship can now download their hall ticket from the official portal.',
                'content'           => '<h2>CSIR NET June 2024 Admit Card</h2><p>The National Testing Agency (NTA) has activated the admit card download link for the Council of Scientific and Industrial Research National Eligibility Test (CSIR NET) June 2024. This exam determines eligibility for Junior Research Fellowship (JRF) and Lectureship/Assistant Professorship.</p><h3>Subjects Covered</h3><ul><li>Chemical Sciences</li><li>Earth, Atmospheric, Ocean &amp; Planetary Sciences</li><li>Life Sciences</li><li>Mathematical Sciences</li><li>Physical Sciences</li></ul><h3>Download Steps</h3><ol><li>Visit <strong>csirnet.nta.nic.in</strong></li><li>Click "Download Admit Card"</li><li>Enter Application Number and Date of Birth</li><li>Download and print minimum two copies</li></ol><p>The examination will be conducted in two shifts. Candidates must report at least 90 minutes before the scheduled start time. No entry will be allowed after gates close.</p>',
                'category'          => 'Admit Card',
                'published_at'      => Carbon::now()->subDays(6),
            ],
            [
                'title'             => 'UP Police Constable Result 2024 — Merit List Published',
                'short_description' => 'UPPRPB has declared the UP Police Constable written exam result 2024. Over 60,000 vacancies. Check the official merit list PDF now and prepare for PET next.',
                'content'           => '<h2>UP Police Constable Result 2024</h2><p>The Uttar Pradesh Police Recruitment and Promotion Board (UPPRPB) has officially declared the written examination result for UP Police Constable Recruitment 2024. Candidates who appeared in the exam can check their result on uppbpb.gov.in.</p><h3>Exam Statistics</h3><ul><li><strong>Total Vacancies:</strong> 60,244</li><li><strong>Total Applicants:</strong> Over 48 lakh</li><li><strong>Exam Conducted By:</strong> UPPRPB</li></ul><h3>Next Stage — Physical Tests</h3><p>Qualified candidates will be called for:</p><ul><li>Physical Efficiency Test (PET)</li><li>Physical Standard Test (PST)</li><li>Document Verification</li></ul><p>The PET/PST schedule will be announced separately on the official website. Keep checking uppbpb.gov.in regularly.</p><h3>How to Check Result</h3><ol><li>Go to <strong>uppbpb.gov.in</strong></li><li>Click "Constable Result 2024"</li><li>Download the merit list PDF</li><li>Press Ctrl+F and type your Roll Number to search</li></ol>',
                'category'          => 'Result',
                'published_at'      => Carbon::now()->subDays(7),
            ],
            [
                'title'             => 'June 2024 Current Affairs — Complete Monthly Digest',
                'short_description' => 'Monthly current affairs digest covering key events in politics, sports, science, economy, and international affairs for June 2024 competitive exam preparation.',
                'content'           => '<h2>June 2024 Current Affairs Digest</h2><p>Stay updated with the most important current affairs for competitive exam preparation. This digest covers all key events across domains for June 2024.</p><h3>National Affairs</h3><ul><li>18th Lok Sabha elections concluded; new government took oath</li><li>Union Budget 2024-25 session dates announced</li><li>New schemes under PM programmes launched</li><li>India GDP growth rate for FY2024 released by CSO</li></ul><h3>International Affairs</h3><ul><li>G7 Summit held in Puglia, Italy — key resolutions passed</li><li>India signed bilateral agreements with partner nations</li><li>UN Security Council non-permanent membership update</li></ul><h3>Sports</h3><ul><li>T20 World Cup 2024 — India &amp; West Indies co-hosts</li><li>Paris Olympics 2024 preparation — India squad updates</li><li>Chess Olympiad 2024 venue and team announcement</li></ul><h3>Science &amp; Technology</h3><ul><li>ISRO upcoming missions — Gaganyaan update</li><li>India semiconductor fab policy milestone</li><li>DRDO new defence system tests</li></ul><p>Bookmark this page. Weekly updates added throughout the month to keep your preparation current.</p>',
                'category'          => 'General',
                'published_at'      => Carbon::now()->subDays(9),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
