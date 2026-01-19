import { Toaster } from "@/components/ui/sonner";
import { TooltipProvider } from "@/components/ui/tooltip";
import { Route, Switch } from "wouter";
import ErrorBoundary from "./components/ErrorBoundary";
import { ThemeProvider } from "./contexts/ThemeContext";

// Public pages
import Home from "./pages/Home";
import Jobs from "./pages/Jobs";
import JobDetail from "./pages/JobDetail";
import Scholarships from "./pages/Scholarships";
import ScholarshipDetail from "./pages/ScholarshipDetail";
import Activities from "./pages/Activities";
import ActivityDetail from "./pages/ActivityDetail";
import Courses from "./pages/Courses";
import CourseDetail from "./pages/CourseDetail";
import Instructors from "./pages/Instructors";
import InstructorDetail from "./pages/InstructorDetail";

// Admin pages
import AdminDashboard from "./pages/admin/Dashboard";
import AdminJobs from "./pages/admin/Jobs";
import AdminJobForm from "./pages/admin/JobForm";
import AdminScholarships from "./pages/admin/Scholarships";
import AdminScholarshipForm from "./pages/admin/ScholarshipForm";
import AdminActivities from "./pages/admin/Activities";
import AdminActivityForm from "./pages/admin/ActivityForm";
import AdminCourses from "./pages/admin/Courses";
import AdminCourseForm from "./pages/admin/CourseForm";
import AdminInstructors from "./pages/admin/Instructors";
import AdminInstructorForm from "./pages/admin/InstructorForm";
import AdminUsers from "./pages/admin/Users";

import NotFound from "@/pages/NotFound";

function Router() {
  return (
    <Switch>
      {/* Public routes */}
      <Route path="/" component={Home} />
      <Route path="/jobs" component={Jobs} />
      <Route path="/jobs/:id" component={JobDetail} />
      <Route path="/scholarships" component={Scholarships} />
      <Route path="/scholarships/:id" component={ScholarshipDetail} />
      <Route path="/activities" component={Activities} />
      <Route path="/activities/:id" component={ActivityDetail} />
      <Route path="/courses" component={Courses} />
      <Route path="/courses/:id" component={CourseDetail} />
      <Route path="/instructors" component={Instructors} />
      <Route path="/instructors/:id" component={InstructorDetail} />
      
      {/* Admin routes */}
      <Route path="/admin" component={AdminDashboard} />
      <Route path="/admin/jobs" component={AdminJobs} />
      <Route path="/admin/jobs/new" component={AdminJobForm} />
      <Route path="/admin/jobs/:id/edit" component={AdminJobForm} />
      <Route path="/admin/scholarships" component={AdminScholarships} />
      <Route path="/admin/scholarships/new" component={AdminScholarshipForm} />
      <Route path="/admin/scholarships/:id/edit" component={AdminScholarshipForm} />
      <Route path="/admin/activities" component={AdminActivities} />
      <Route path="/admin/activities/new" component={AdminActivityForm} />
      <Route path="/admin/activities/:id/edit" component={AdminActivityForm} />
      <Route path="/admin/courses" component={AdminCourses} />
      <Route path="/admin/courses/new" component={AdminCourseForm} />
      <Route path="/admin/courses/:id/edit" component={AdminCourseForm} />
      <Route path="/admin/instructors" component={AdminInstructors} />
      <Route path="/admin/instructors/new" component={AdminInstructorForm} />
      <Route path="/admin/instructors/:id/edit" component={AdminInstructorForm} />
      <Route path="/admin/users" component={AdminUsers} />
      
      <Route path="/404" component={NotFound} />
      <Route component={NotFound} />
    </Switch>
  );
}

function App() {
  return (
    <ErrorBoundary>
      <ThemeProvider defaultTheme="light">
        <TooltipProvider>
          <Toaster />
          <Router />
        </TooltipProvider>
      </ThemeProvider>
    </ErrorBoundary>
  );
}

export default App;
