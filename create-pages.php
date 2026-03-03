<?php

/**
 * Script to create CMS-managed pages from hardcoded templates.
 * Run with: ddev drush scr create-pages.php
 */

use Drupal\node\Entity\Node;
use Drupal\path_alias\Entity\PathAlias;

$pages = [
  [
    'title' => 'About Us',
    'alias' => '/about',
    'body' => '<h2>Department of Computer Science</h2>
<p>The Department of Computer Science was founded in 1972 and has become a leading computer science research and education institution. We have now merged with Mathematics and Applied Mathematics to form the Computer Science Division in the Department of Mathematical Sciences at Stellenbosch University.</p>

<h2>Our Vision</h2>
<p>We are committed to advancing computational thinking, developing foundational technologies, and solving real-world problems through computer science. Our department is dedicated to academic excellence, innovative research, and practical education that prepares students for global technological challenges.</p>

<h2>Research &amp; Expertise</h2>
<p>Our 11 full members of academic staff conduct cutting-edge research across diverse fields:</p>
<ul>
<li>Automata Theory &amp; Formal Languages</li>
<li>Software Engineering &amp; Verification</li>
<li>Machine Learning &amp; Artificial Intelligence</li>
<li>Broadband &amp; Mobile Networks</li>
<li>Robotics &amp; Cognitive Systems</li>
<li>Natural Language Processing</li>
<li>Data Science &amp; Analytics</li>
</ul>

<h2>Programs &amp; Education</h2>
<p>We offer comprehensive undergraduate and postgraduate programs in Computer Science, including:</p>
<ul>
<li>BSc Computer Science (with multiple focal areas)</li>
<li>BDatSci - Bachelor of Data Science</li>
<li>Honours in Computer Science</li>
<li>Masters in Computer Science</li>
<li>PhD in Computer Science</li>
</ul>

<p>Our curriculum combines theoretical foundations with practical applications, ensuring students graduate with both deep knowledge and real-world expertise.</p>

<h2>Get in Touch</h2>
<p>Want to learn more about our programs or research? <a href="/contact">Contact us</a> or visit our <a href="https://cs.sun.ac.za" target="_blank">main website</a>.</p>',
  ],
  [
    'title' => 'Research',
    'alias' => '/research',
    'body' => '<h2>Research Areas</h2>
<p>The Department of Computer Science at Stellenbosch University is home to a vibrant research community. Our academic staff and postgraduate students are involved in cutting-edge research across multiple disciplines.</p>

<h2>Key Research Groups</h2>
<ul>
<li><strong>Machine Learning &amp; AI</strong> – Deep learning, reinforcement learning, computer vision, and natural language processing.</li>
<li><strong>Software Engineering</strong> – Software verification, formal methods, and agile development practices.</li>
<li><strong>Theoretical Computer Science</strong> – Automata theory, formal languages, and computational complexity.</li>
<li><strong>Networks &amp; Systems</strong> – Broadband networks, mobile computing, and distributed systems.</li>
<li><strong>Robotics &amp; Cognitive Systems</strong> – Autonomous systems, human-robot interaction, and cognitive modeling.</li>
<li><strong>Data Science</strong> – Big data analytics, statistical modeling, and data visualization.</li>
</ul>

<h2>Publications &amp; Impact</h2>
<p>Our researchers regularly publish in top-tier international journals and conferences. Since 2018, our department has produced over 149 publications, contributing to the global body of computer science knowledge.</p>

<h2>Research Collaboration</h2>
<p>We actively collaborate with national and international institutions, industry partners, and government agencies to drive impactful research that addresses real-world challenges.</p>',
  ],
  [
    'title' => 'Undergraduate',
    'alias' => '/undergraduate',
    'body' => '<h2>Undergraduate Studies in Computer Science</h2>
<p>The Department of Computer Science offers a range of undergraduate programmes designed to equip students with strong foundations in computational thinking, programming, and problem-solving skills.</p>

<h2>Why Study Computer Science?</h2>
<p>Computer Science is one of the most versatile and in-demand fields globally. Our programmes prepare students for careers in software development, data science, cybersecurity, artificial intelligence, and many other technology-driven industries.</p>

<h2>Programme Structure</h2>
<p>Our undergraduate programs follow a progressive learning path:</p>
<ul>
<li><strong>First Year</strong> – Introduction to programming, mathematical foundations, and computational thinking</li>
<li><strong>Second Year</strong> – Data structures, algorithms, software engineering, and systems programming</li>
<li><strong>Third Year</strong> – Advanced topics including AI, databases, networks, and elective specializations</li>
</ul>

<h2>Explore More</h2>
<ul>
<li><a href="/undergraduate/modules">View our module offerings</a></li>
<li><a href="/undergraduate/programmes">Browse programme guides</a></li>
<li><a href="/undergraduate/prospective">Information for prospective students</a></li>
</ul>',
  ],
  [
    'title' => 'Undergraduate Modules',
    'alias' => '/undergraduate/modules',
    'body' => '<h2>Module Offerings</h2>
<p>The following modules are offered as part of our undergraduate Computer Science programmes:</p>

<h3>First Year</h3>
<ul>
<li><strong>CS 114</strong> – Introduction to Programming (Python)</li>
<li><strong>CS 144</strong> – Introduction to Programming (Java)</li>
</ul>

<h3>Second Year</h3>
<ul>
<li><strong>CS 214</strong> – Data Structures and Algorithms</li>
<li><strong>CS 244</strong> – Systems Programming and Computer Organisation</li>
</ul>

<h3>Third Year</h3>
<ul>
<li><strong>CS 313</strong> – Automata Theory and Logic</li>
<li><strong>CS 314</strong> – Advanced Programming Techniques</li>
<li><strong>CS 315</strong> – Database Systems</li>
<li><strong>CS 343</strong> – Operating Systems</li>
<li><strong>CS 344</strong> – Computer Networks</li>
<li><strong>CS 345</strong> – Artificial Intelligence</li>
</ul>

<h3>Service Modules</h3>
<ul>
<li><strong>SC 272</strong> – Scientific Computing</li>
<li><strong>SC 372</strong> – Advanced Scientific Computing</li>
</ul>',
  ],
  [
    'title' => 'Undergraduate Programmes',
    'alias' => '/undergraduate/programmes',
    'body' => '<h2>Programme Guide</h2>
<p>We offer several BSc programme streams that include Computer Science as a major:</p>

<h3>BSc with Computer Science Major</h3>
<p>A three-year degree combining Computer Science with complementary subjects. Available focal areas include:</p>
<ul>
<li><strong>Computer Science &amp; Mathematics</strong> – Ideal for students interested in theoretical CS and mathematical foundations</li>
<li><strong>Computer Science &amp; Applied Mathematics</strong> – Focus on computational modeling and scientific computing</li>
<li><strong>Computer Science &amp; Information Systems</strong> – Combines technical skills with business and systems analysis</li>
<li><strong>Computer Science &amp; Statistics</strong> – Prepares students for data science and statistical computing careers</li>
<li><strong>Computer Science &amp; Genetics</strong> – Combines CS with biological sciences for bioinformatics</li>
</ul>

<h3>BDatSci – Bachelor of Data Science</h3>
<p>A specialized three-year degree focusing on the intersection of Computer Science, Statistics, and Applied Mathematics. This programme trains data scientists with skills in machine learning, big data analytics, and statistical modeling.</p>',
  ],
  [
    'title' => 'Undergraduate Prospective Students',
    'alias' => '/undergraduate/prospective',
    'body' => '<h2>Information for Prospective Students</h2>
<p>Interested in studying Computer Science at Stellenbosch University? Here is what you need to know.</p>

<h2>Admission Requirements</h2>
<ul>
<li>National Senior Certificate (NSC) with university exemption</li>
<li>Mathematics: Minimum Level 5 (60%+)</li>
<li>English: Minimum Level 4 (50%+)</li>
<li>Faculty-specific point score requirements apply</li>
</ul>

<h2>How to Apply</h2>
<ol>
<li>Visit <a href="https://www.sun.ac.za/english/learning-teaching/student-affairs/Pages/Admissions.aspx" target="_blank">Stellenbosch University Admissions</a></li>
<li>Select your preferred BSc programme with Computer Science</li>
<li>Submit required documents and application fee</li>
<li>Applications typically close 30 June for the following year</li>
</ol>

<h2>Bursaries &amp; Financial Aid</h2>
<p>Various bursaries and financial aid options are available for Computer Science students. Visit the <a href="https://www.sun.ac.za/english/learning-teaching/student-affairs/Pages/Bursaries.aspx" target="_blank">SU Financial Aid page</a> for more information.</p>',
  ],
  [
    'title' => 'Postgraduate',
    'alias' => '/postgraduate',
    'body' => '<h2>Postgraduate Studies in Computer Science</h2>
<p>The Department of Computer Science at Stellenbosch University offers a comprehensive range of postgraduate qualifications for students wishing to pursue advanced studies and research in Computer Science.</p>

<h2>Why Postgraduate Study?</h2>
<p>Postgraduate study in Computer Science opens doors to advanced research, specialized career paths, and leadership opportunities in the technology sector. Our programs offer:</p>
<ul>
<li>Access to world-class research facilities and supervision</li>
<li>Collaboration with leading industry partners</li>
<li>Opportunities for publication and conference participation</li>
<li>Generous bursaries and funding options</li>
</ul>

<h2>Available Programmes</h2>
<ul>
<li><a href="/postgraduate/honours">Honours in Computer Science</a> – 1-year coursework + mini-thesis</li>
<li><a href="/postgraduate/masters">Masters in Computer Science</a> – 2-year research degree</li>
<li><a href="/postgraduate/phd">PhD in Computer Science</a> – 3-4 year doctoral research</li>
</ul>

<h2>Explore More</h2>
<ul>
<li><a href="/postgraduate/modules">View postgraduate module offerings</a></li>
<li><a href="/postgraduate/prospective">Information for prospective students</a></li>
</ul>',
  ],
  [
    'title' => 'Postgraduate Modules',
    'alias' => '/postgraduate/modules',
    'body' => '<h2>Postgraduate Module Offerings</h2>
<p>The following modules are available for Honours, Masters (coursework component), and preparatory studies:</p>

<h3>Core Modules</h3>
<ul>
<li><strong>CS 712</strong> – Machine Learning</li>
<li><strong>CS 716</strong> – Network Security</li>
<li><strong>CS 746</strong> – Software Architecture</li>
<li><strong>CS 771</strong> – Research Methodology</li>
</ul>

<h3>Elective Modules</h3>
<ul>
<li><strong>CS 791</strong> – Advanced Artificial Intelligence</li>
<li><strong>CS 795</strong> – Computer Vision</li>
<li><strong>CS 742</strong> – Cloud Computing</li>
<li><strong>CS 711</strong> – Advanced Algorithms</li>
<li><strong>CS 714</strong> – Parallel Computing</li>
<li><strong>CS 741</strong> – Database Design</li>
<li><strong>CS 745</strong> – Distributed Systems</li>
</ul>

<p>Module availability may vary per year. Contact the department for the current year offerings.</p>',
  ],
  [
    'title' => 'Honours in Computer Science',
    'alias' => '/postgraduate/honours',
    'body' => '<h2>BScHons Computer Science</h2>
<p>The Honours programme in Computer Science is a one-year postgraduate qualification that deepens your knowledge in advanced Computer Science topics while developing research skills.</p>

<h2>Programme Structure</h2>
<ul>
<li><strong>Duration:</strong> 1 year full-time</li>
<li><strong>Coursework:</strong> 4-5 advanced modules</li>
<li><strong>Mini-thesis:</strong> Research project under supervision (~40% of final mark)</li>
</ul>

<h2>Admission Requirements</h2>
<ul>
<li>BSc degree with Computer Science as major</li>
<li>Minimum 60% average in final-year Computer Science modules</li>
<li>Approval from the department</li>
</ul>

<h2>Career Prospects</h2>
<p>Honours graduates go on to careers in software engineering, data science, research, and consulting. Many continue to Masters or PhD studies.</p>',
  ],
  [
    'title' => 'Masters in Computer Science',
    'alias' => '/postgraduate/masters',
    'body' => '<h2>MSc Computer Science</h2>
<p>The Masters programme is a research-focused postgraduate degree that prepares students for careers in advanced research, academia, and specialized industry roles.</p>

<h2>Programme Structure</h2>
<ul>
<li><strong>Duration:</strong> 2 years full-time</li>
<li><strong>Research:</strong> Full thesis under supervision of an academic staff member</li>
<li><strong>Coursework:</strong> May include preparatory modules depending on background</li>
</ul>

<h2>Research Areas</h2>
<p>Masters students can pursue research in any of the department\'s active research areas, including machine learning, software engineering, network security, theoretical computer science, and more.</p>

<h2>Admission Requirements</h2>
<ul>
<li>Honours degree in Computer Science (or equivalent)</li>
<li>Minimum 65% average</li>
<li>Approved research proposal</li>
<li>Available supervisor in chosen research area</li>
</ul>

<h2>Funding</h2>
<p>Bursaries are available for full-time Masters students. Contact the department for current funding opportunities.</p>',
  ],
  [
    'title' => 'PhD in Computer Science',
    'alias' => '/postgraduate/phd',
    'body' => '<h2>PhD Computer Science</h2>
<p>The PhD programme represents the highest level of academic achievement in Computer Science. Candidates conduct original research that contributes new knowledge to the field.</p>

<h2>Programme Structure</h2>
<ul>
<li><strong>Duration:</strong> 3-4 years full-time</li>
<li><strong>Research:</strong> Original doctoral dissertation under supervision</li>
<li><strong>Publications:</strong> Candidates are expected to publish in peer-reviewed journals/conferences</li>
<li><strong>Defence:</strong> Oral examination of the dissertation</li>
</ul>

<h2>Admission Requirements</h2>
<ul>
<li>Masters degree in Computer Science (or equivalent)</li>
<li>Strong academic record</li>
<li>Detailed research proposal</li>
<li>Confirmed supervisor</li>
</ul>

<h2>Research Support</h2>
<p>PhD candidates have access to dedicated research facilities, computing resources, conference travel funding, and collaborative research networks both nationally and internationally.</p>

<h2>Funding</h2>
<p>Full bursaries are available for qualifying PhD candidates. Additional funding may be available through NRF, industry partnerships, and departmental grants.</p>',
  ],
  [
    'title' => 'Postgraduate Prospective Students',
    'alias' => '/postgraduate/prospective',
    'body' => '<h2>Information for Prospective Postgraduate Students</h2>
<p>Considering postgraduate study in Computer Science at Stellenbosch University? Here\'s everything you need to know.</p>

<h2>How to Apply</h2>
<ol>
<li>Identify your preferred programme (Honours, Masters, or PhD)</li>
<li>Contact a potential supervisor in your research area of interest</li>
<li>Prepare all required documents (academic transcripts, CV, research proposal where applicable)</li>
<li>Submit your application through the <a href="https://www.sun.ac.za/english/learning-teaching/student-affairs/Pages/Admissions.aspx" target="_blank">SU online application portal</a></li>
</ol>

<h2>Application Deadlines</h2>
<ul>
<li><strong>Honours:</strong> 31 October for the following year</li>
<li><strong>Masters:</strong> 31 October for the following year</li>
<li><strong>PhD:</strong> Applications accepted year-round (subject to supervisor availability)</li>
</ul>

<h2>Funding &amp; Bursaries</h2>
<p>Various funding options are available:</p>
<ul>
<li>Departmental bursaries for Honours and Masters students</li>
<li>NRF (National Research Foundation) scholarships</li>
<li>Industry-sponsored bursaries</li>
<li>SU Postgraduate Funding Office support</li>
</ul>

<h2>Frequently Asked Questions</h2>
<p><strong>Can I study part-time?</strong> Masters and PhD programmes may be pursued part-time. Honours is typically full-time only.</p>
<p><strong>Do I need a CS Honours for Masters?</strong> Yes, or an equivalent qualification approved by the department.</p>
<p><strong>Can international students apply?</strong> Yes, we welcome international applications. Additional documentation may be required.</p>',
  ],
  [
    'title' => 'News & Announcements',
    'alias' => '/news',
    'body' => '<h2>Latest News</h2>
<p>Stay up to date with the latest news and announcements from the Department of Computer Science at Stellenbosch University.</p>

<h3>Department Updates</h3>
<p>Check back regularly for news about research breakthroughs, student achievements, upcoming events, and departmental announcements.</p>

<h3>Events &amp; Seminars</h3>
<p>The department hosts regular research seminars, guest lectures, and industry events. Visit our events calendar for upcoming activities.</p>

<h3>Student Achievements</h3>
<p>We are proud of our students\' accomplishments in research, competitions, and industry. Featured achievements will be highlighted here.</p>

<p>For the latest updates, you can also follow us on social media or visit <a href="https://cs.sun.ac.za" target="_blank">cs.sun.ac.za</a>.</p>',
  ],
  [
    'title' => 'Contact Us',
    'alias' => '/contact',
    'body' => '<h2>Get in Touch</h2>

<h3>Department of Computer Science</h3>
<p>
Stellenbosch University<br>
Private Bag X1, Matieland, 7602<br>
Stellenbosch, South Africa
</p>

<h3>Physical Address</h3>
<p>
Computer Science Division<br>
Department of Mathematical Sciences<br>
General Engineering Building (A-Block)<br>
Stellenbosch University<br>
Stellenbosch, 7600
</p>

<h3>Contact Details</h3>
<ul>
<li><strong>Phone:</strong> +27 21 808 4232</li>
<li><strong>Fax:</strong> +27 21 808 4416</li>
<li><strong>Email:</strong> <a href="mailto:csdept@sun.ac.za">csdept@sun.ac.za</a></li>
<li><strong>Website:</strong> <a href="https://cs.sun.ac.za" target="_blank">cs.sun.ac.za</a></li>
</ul>

<h3>Head of Department</h3>
<p>For enquiries regarding the department, please contact the departmental secretary or head of department via the contact details above.</p>

<h3>Undergraduate Enquiries</h3>
<p>For undergraduate programme information, please email <a href="mailto:csdept@sun.ac.za">csdept@sun.ac.za</a> or visit during office hours (08:00 – 16:30, Monday to Friday).</p>

<h3>Postgraduate Enquiries</h3>
<p>For postgraduate applications and research supervision, please contact the postgraduate coordinator at <a href="mailto:csdept@sun.ac.za">csdept@sun.ac.za</a>.</p>',
  ],
];

// First, check and remove any existing nodes with these aliases
$alias_storage = \Drupal::entityTypeManager()->getStorage('path_alias');

foreach ($pages as $page) {
  // Check if a node with this alias already exists
  $existing = $alias_storage->loadByProperties(['alias' => $page['alias']]);
  if (!empty($existing)) {
    echo "Alias {$page['alias']} already exists, skipping {$page['title']}\n";
    continue;
  }

  $node = Node::create([
    'type' => 'page',
    'title' => $page['title'],
    'body' => [
      'value' => $page['body'],
      'format' => 'full_html',
    ],
    'status' => 1,
    'uid' => 1,
    'path' => [
      'alias' => $page['alias'],
      'pathauto' => 0,
    ],
  ]);
  $node->save();
  echo "Created: {$page['title']} → {$page['alias']} (node/{$node->id()})\n";
}

echo "\nDone! All pages created as CMS nodes.\n";
echo "Edit them at: /admin/content\n";
